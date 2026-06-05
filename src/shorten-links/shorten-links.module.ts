import { Module } from '@nestjs/common';
import { ShortenLinksController } from './shorten-links.controller';
import { ShortenLinksService } from './shorten-links.service';

@Module({
  controllers: [ShortenLinksController],
  providers: [ShortenLinksService],
})
export class ShortenLinksModule {}
