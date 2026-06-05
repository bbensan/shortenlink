import { Global, Module } from '@nestjs/common';
import { drizzle } from 'drizzle-orm/node-postgres';
import { Pool } from 'pg';
import { DRIZZLE_DB } from './database.constants';
import { DatabaseService } from './database.service';
import * as schema from './schema';

@Global()
@Module({
  providers: [
    {
      provide: DRIZZLE_DB,
      useFactory: () => {
        const pool = new Pool({
          connectionString: process.env.DATABASE_URL,
        });
        return drizzle(pool, { schema });
      },
    },
    DatabaseService,
  ],
  exports: [DRIZZLE_DB, DatabaseService],
})
export class DatabaseModule {}
