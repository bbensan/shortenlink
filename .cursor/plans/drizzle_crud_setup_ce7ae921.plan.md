---
name: Drizzle CRUD Setup
overview: Membuat integrasi Drizzle ORM ke NestJS dengan dua schema (users & shorten_links), modul database terpusat, dan dua modul CRUD lengkap (controller + service + DTO).
todos:
  - id: schema
    content: "Buat schema files: users.schema.ts, shorten-links.schema.ts, dan index.ts di src/database/schema/"
    status: completed
  - id: drizzle-config
    content: Buat drizzle.config.ts di root dan tambah db:* scripts ke package.json
    status: completed
  - id: database-module
    content: Buat src/database/database.module.ts dan database.service.ts dengan DRIZZLE_DB injection token
    status: completed
  - id: users-module
    content: "Buat users module lengkap: controller, service, dan DTOs"
    status: completed
  - id: shorten-links-module
    content: "Buat shorten-links module lengkap: controller, service, dan DTOs"
    status: completed
  - id: app-module
    content: Update src/app.module.ts untuk import DatabaseModule, UsersModule, ShortenLinksModule
    status: completed
isProject: false
---

# Drizzle + NestJS CRUD Setup

## Struktur File yang Akan Dibuat

```
src/
  database/
    schema/
      users.schema.ts
      shorten-links.schema.ts
      index.ts
    database.module.ts
    database.service.ts
  users/
    dto/
      create-user.dto.ts
      update-user.dto.ts
    users.module.ts
    users.controller.ts
    users.service.ts
  shorten-links/
    dto/
      create-shorten-link.dto.ts
      update-shorten-link.dto.ts
    shorten-links.module.ts
    shorten-links.controller.ts
    shorten-links.service.ts
drizzle.config.ts       (baru)
```

**File yang diupdate:** [`src/app.module.ts`](src/app.module.ts), [`.env`](.env), [`package.json`](package.json)

---

## Schema Database

### Users (`src/database/schema/users.schema.ts`)
- `id` — uuid, PK, `defaultRandom()` (pakai `gen_random_uuid()` Postgres)
- `name` — varchar(255), not null
- `username` — varchar(100), nullable, unique
- `email` — varchar(255), not null, unique
- `password` — varchar(255), not null
- `email_verified_at` — timestamp, nullable
- `status` — varchar(20), default `'active'` (active / inactive / banned)
- `created_at` — timestamp, default `now()`
- `updated_at` — timestamp, default `now()`

### Shorten Links (`src/database/schema/shorten-links.schema.ts`)
- `id` — uuid, PK, `defaultRandom()`
- `user_id` — uuid, FK → `users.id`, nullable, `onDelete: 'set null'`
- `title` — varchar(255), not null
- `original_url` — text, not null
- `shortened_url` — varchar(50), not null, unique
- `status` — varchar(20), default `'active'`
- `created_at` — timestamp, default `now()`
- `updated_at` — timestamp, default `now()`

---

## Drizzle Module (`src/database/database.module.ts`)

Membuat `DrizzleModule` yang bersifat `global` dengan provider custom token `DRIZZLE_DB`:

```typescript
// Contoh struktur provider
{
  provide: 'DRIZZLE_DB',
  useFactory: () => {
    const pool = new Pool({ connectionString: process.env.DATABASE_URL });
    return drizzle(pool, { schema });
  }
}
```

`DatabaseService` kemudian meng-inject token tersebut dan menjadi satu-satunya pintu masuk ke db instance untuk semua module.

---

## CRUD Endpoints

### Users (`/users`)
| Method | Path | Keterangan |
|--------|------|------------|
| GET | `/users` | List semua user |
| GET | `/users/:id` | Get user by ID |
| POST | `/users` | Create user |
| PATCH | `/users/:id` | Update user |
| DELETE | `/users/:id` | Delete user |

### Shorten Links (`/shorten-links`)
| Method | Path | Keterangan |
|--------|------|------------|
| GET | `/shorten-links` | List semua link |
| GET | `/shorten-links/:id` | Get link by ID |
| POST | `/shorten-links` | Create link |
| PATCH | `/shorten-links/:id` | Update link |
| DELETE | `/shorten-links/:id` | Delete link |

---

## drizzle.config.ts

```typescript
export default defineConfig({
  schema: './src/database/schema/index.ts',
  out: './drizzle',
  dialect: 'postgresql',
  dbCredentials: { url: process.env.DATABASE_URL! },
});
```

## Scripts Tambahan di package.json

- `"db:generate"` — `drizzle-kit generate` (buat file migrasi)
- `"db:migrate"` — `drizzle-kit migrate` (jalankan migrasi)
- `"db:push"` — `drizzle-kit push` (langsung push schema ke DB, cocok untuk dev)
- `"db:studio"` — `drizzle-kit studio` (GUI Drizzle Studio)

---

## Catatan

- Password di-store as-is untuk saat ini (test CRUD saja), nanti bisa ditambah hashing saat fase JWT/Passport.
- Tidak ada validasi pipe (`class-validator`) untuk sekarang agar tetap sederhana.
- `.env` sudah memiliki `DATABASE_URL`, tidak perlu diubah.
