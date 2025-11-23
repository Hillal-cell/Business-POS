# Installation Guide

## Prerequisites
- PHP 8.2+ with extensions: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath
- Composer 2.x
- Node.js 18+ and npm 9+
- Database:
  - MySQL 8+ 
- Web server (Nginx/Apache) or Laravel built-in server

## 1. Clone or Extract
- Extract the compressed archive to your desired folder
- Cloning the repository 

    ```bash
    git clone [`https://github.com/Hillal-cell/Business-POS.git`]
    cd poss
    ```
- Ensure proper permissions:
  - `storage/` and `bootstrap/cache/` must be writable.

## 2. Environment Setup
- Copy `.env.example` to `.env`:
  - `cp .env.example .env`
- Update `.env` values:
  - `APP_NAME=YourApp`
  - `APP_ENV=local`
  - `APP_KEY=` (leave blank; will be generated)
  - `APP_URL=http://localhost`
  - Database:
    - `DB_CONNECTION=mysql`
    - `DB_HOST=127.0.0.1`
    - `DB_PORT=3306`
    - `DB_DATABASE=your_database_name`
    - `DB_USERNAME=your_db_user`
    - `DB_PASSWORD=your_db_password`
- Security note: Do not use production secrets in this demo .env. Use environment-appropriate credentials.

## 3. Install Dependencies
- PHP:
  - `composer install --no-interaction --prefer-dist`
- Generate app key:
  - `php artisan key:generate`
- Frontend:
  - `npm install`
  - `npm run dev` 

## 4. Database
- Create an empty database in your DB server:
  - MySQL: `CREATE DATABASE your_database_name CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;`
- Import dump:
  - MySQL: `mysql -u your_db_user -p your_database_name < possdb.sql`
- Alternatively, use migrations and seeders:
  - `php artisan migrate --force`
  - `php artisan db:seed --force`

Note: The Laratrust seeder included will create roles and (if enabled in `config/laratrust_seeder.php`) seed users. The seeded admin credentials (development) are:

- Email: `admin@admin.com`
- Password: `password`



## 5. Storage and Cache
- Link storage:
  - `php artisan storage:link`
- Clear and cache:
  - `php artisan config:clear`
  - `php artisan cache:clear`
  - `php artisan route:clear`
  - `php artisan view:clear`
  - Optionally cache:
    - `php artisan config:cache`
    - `php artisan route:cache`

## 6. Run the Application
- Built-in server:
  - `php artisan serve` (default: http://127.0.0.1:8000)

