import { Module } from '@nestjs/common';
import { AuthModule } from '../auth/auth.module';
import { ShortenLinksController } from './shorten-links.controller';
import { ShortenLinksService } from './shorten-links.service';

@Module({
  imports: [AuthModule],
  controllers: [ShortenLinksController],
  providers: [ShortenLinksService],
})
export class ShortenLinksModule {}
