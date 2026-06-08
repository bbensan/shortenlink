import { Module } from '@nestjs/common';
import { AuthModule } from './auth/auth.module';
import { DatabaseModule } from './database/database.module';
import { ShortenLinksModule } from './shorten-links/shorten-links.module';
import { HealthModule } from './health/health.module';

@Module({
  imports: [
    DatabaseModule, 
    AuthModule, 
    ShortenLinksModule,
    HealthModule
  ],
})
export class AppModule {}
