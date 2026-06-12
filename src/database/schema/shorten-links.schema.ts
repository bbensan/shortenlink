import {
  pgTable,
  uuid,
  varchar,
  text,
  boolean,
  timestamp,
} from 'drizzle-orm/pg-core';
import { users } from './users.schema';

export const shortenLinks = pgTable('shorten_links', {
  id: uuid('id').primaryKey().defaultRandom(),
  userId: uuid('user_id').references(() => users.id, {
    onDelete: 'set null',
  }),
  title: varchar('title', { length: 255 }),
  originalUrl: text('original_url').notNull(),
  shortenedUrl: varchar('shortened_url', { length: 50 }).notNull().unique(),
  status: varchar('status', { length: 20 }).notNull().default('active'),
  fastRedirect: boolean('fast_redirect').notNull().default(false),
  userIp: varchar('user_ip', { length: 45 }),
  createdAt: timestamp('created_at').notNull().defaultNow(),
  updatedAt: timestamp('updated_at').notNull().defaultNow(),
});

export type ShortenLink = typeof shortenLinks.$inferSelect;
export type NewShortenLink = typeof shortenLinks.$inferInsert;
