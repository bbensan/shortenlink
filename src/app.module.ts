import { Module } from '@nestjs/common';
import { DatabaseModule } from './database/database.module';
import { ShortenLinksModule } from './shorten-links/shorten-links.module';
import { UsersModule } from './users/users.module';

@Module({
  imports: [DatabaseModule, UsersModule, ShortenLinksModule],
})
export class AppModule {}
