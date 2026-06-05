import { Injectable, NotFoundException } from '@nestjs/common';
import * as bcrypt from 'bcrypt';
import { eq } from 'drizzle-orm';
import { DatabaseService } from '../database/database.service';
import { users } from '../database/schema';
import { CreateUserDto } from './dto/create-user.dto';
import { UpdateUserDto } from './dto/update-user.dto';

@Injectable()
export class UsersService {
  constructor(private readonly databaseService: DatabaseService) {}

  async findAll() {
    const db = this.databaseService.getDb();
    return db.select().from(users);
  }

  async findOne(id: string) {
    const db = this.databaseService.getDb();
    const [user] = await db.select().from(users).where(eq(users.id, id));

    if (!user) {
      throw new NotFoundException(`User with id ${id} not found`);
    }

    return user;
  }

  async findByEmail(email: string) {
    const db = this.databaseService.getDb();
    const [user] = await db
      .select()
      .from(users)
      .where(eq(users.email, email));
    return user ?? null;
  }

  async create(createUserDto: CreateUserDto) {
    const db = this.databaseService.getDb();
    const hashedPassword = await bcrypt.hash(createUserDto.password, 10);
    const [user] = await db
      .insert(users)
      .values({
        name: createUserDto.name,
        email: createUserDto.email,
        password: hashedPassword,
        username: createUserDto.username,
        status: createUserDto.status,
      })
      .returning();

    return user;
  }

  async update(id: string, updateUserDto: UpdateUserDto) {
    await this.findOne(id);

    const db = this.databaseService.getDb();
    const [user] = await db
      .update(users)
      .set({
        ...updateUserDto,
        updatedAt: new Date(),
      })
      .where(eq(users.id, id))
      .returning();

    return user;
  }

  async remove(id: string) {
    await this.findOne(id);

    const db = this.databaseService.getDb();
    const [user] = await db
      .delete(users)
      .where(eq(users.id, id))
      .returning();
    
    if (!user) {
      throw new NotFoundException(`User with id ${id} not found`);
    }

    return user;
  }
}
