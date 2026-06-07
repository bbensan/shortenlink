import { Injectable, InternalServerErrorException, NotFoundException } from '@nestjs/common';
import { randomBytes } from 'crypto';
import { eq } from 'drizzle-orm';
import { DatabaseService } from '../database/database.service';
import { shortenLinks } from '../database/schema';
import { CreateShortenLinkDto } from './dto/create-shorten-link.dto';
import { UpdateShortenLinkDto } from './dto/update-shorten-link.dto';

@Injectable()
export class ShortenLinksService {
  private readonly shortCodeChars =
    'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  private readonly shortCodeLength = 6;
  private readonly maxGenerationAttempts = 10;

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

  async create(createShortenLinkDto: CreateShortenLinkDto, userId?: string) {
    const db = this.databaseService.getDb();
    const shortenedUrl = await this.generateUniqueShortCode();

    const [link] = await db
      .insert(shortenLinks)
      .values({
        title: createShortenLinkDto.title,
        originalUrl: createShortenLinkDto.original_url,
        shortenedUrl,
        userId: userId ?? null,
        userIp: createShortenLinkDto.userIp,
        status: createShortenLinkDto.status,
      })
      .returning();

    return {
      status: 'success',
      message: 'Shorten link created successfully',
      data: {
        original_url: link.originalUrl,
        shortened_url: link.shortenedUrl,
      },
    };
  }

  private generateShortCode(): string {
    const randomValues = randomBytes(this.shortCodeLength);
    let code = '';

    for (let i = 0; i < this.shortCodeLength; i++) {
      code += this.shortCodeChars[randomValues[i] % this.shortCodeChars.length];
    }

    return code;
  }

  private async isShortCodeTaken(shortenedUrl: string): Promise<boolean> {
    const db = this.databaseService.getDb();
    const [existing] = await db
      .select({ id: shortenLinks.id })
      .from(shortenLinks)
      .where(eq(shortenLinks.shortenedUrl, shortenedUrl))
      .limit(1);

    return !!existing;
  }

  private async generateUniqueShortCode(): Promise<string> {
    for (let attempt = 0; attempt < this.maxGenerationAttempts; attempt++) {
      const code = this.generateShortCode();
      const taken = await this.isShortCodeTaken(code);

      if (!taken) {
        return code;
      }
    }

    throw new InternalServerErrorException(
      'Failed to generate unique shortened url. Please try again.',
    );
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
