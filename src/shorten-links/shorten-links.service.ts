import { Injectable, NotFoundException } from '@nestjs/common';
import { eq } from 'drizzle-orm';
import { DatabaseService } from '../database/database.service';
import { shortenLinks } from '../database/schema';
import { CreateShortenLinkDto } from './dto/create-shorten-link.dto';
import { UpdateShortenLinkDto } from './dto/update-shorten-link.dto';

@Injectable()
export class ShortenLinksService {
  constructor(private readonly databaseService: DatabaseService) {}

  async findAll() {
    const db = this.databaseService.getDb();
    return db.select().from(shortenLinks);
  }

  async findOne(id: string) {
    const db = this.databaseService.getDb();
    const [link] = await db
      .select()
      .from(shortenLinks)
      .where(eq(shortenLinks.id, id));

    if (!link) {
      throw new NotFoundException(`Shorten link with id ${id} not found`);
    }

    return link;
  }

  async findOnebyShortenedUrl(shortened_url: string) {
    const db = this.databaseService.getDb();

    const [link] = await db
      .select()
      .from(shortenLinks)
      .where(eq(shortenLinks.shortenedUrl, shortened_url));

    if (!link) {
      throw new NotFoundException(`Shorten link with shortened url ${shortened_url} not found`);
    }

    const response = {
      original_url: link.originalUrl,
      status: link.status,
    }

    return response;
  }

  async create(createShortenLinkDto: CreateShortenLinkDto) {
    const db = this.databaseService.getDb();
    const [link] = await db
      .insert(shortenLinks)
      .values({
        title: createShortenLinkDto.title,
        originalUrl: createShortenLinkDto.original_url,
        shortenedUrl: createShortenLinkDto.shortened_url,
        userId: createShortenLinkDto.userId,
        status: createShortenLinkDto.status,
      })
      .returning();

    return link;
  }

  async update(id: string, updateShortenLinkDto: UpdateShortenLinkDto) {
    await this.findOne(id);

    const db = this.databaseService.getDb();
    const [link] = await db
      .update(shortenLinks)
      .set({
        ...updateShortenLinkDto,
        updatedAt: new Date(),
      })
      .where(eq(shortenLinks.id, id))
      .returning();

    return link;
  }

  async remove(id: string) {
    await this.findOne(id);

    const db = this.databaseService.getDb();
    const [link] = await db
      .delete(shortenLinks)
      .where(eq(shortenLinks.id, id))
      .returning();

    return link;
  }
}
