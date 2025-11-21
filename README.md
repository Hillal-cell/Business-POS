# Business-POS / Posprime

![Inovate](post.PNG)

## About Posprime

Posprime (Business-POS) is a web application designed to help small and medium retailers manage sales, inventory, expenses and reporting. It provides a lightweight POS interface, product and stock management, reporting, and staff management to streamline daily operations.

Key modules:
- Staff
- Products
- Barcode
- Suppliers
- Stock / Inventory
- POS (checkout)
- Core products
- Purchase cart
- Batch management
- Expenses
- Reports
- Audit trails
- Leaves
- Tasks
- Notifications

## Installation (developer / local)
Follow these steps to set up the project locally for development:

1. Clone the repository:

```bash
git clone <your-repo-url>
cd poss
```

2. Install PHP dependencies:

```bash
composer install
```

3. Copy the example env and generate the application key:

```bash
cp .env.example .env
php artisan key:generate
```

4. Configure your database in `.env` (DB_DATABASE, DB_USERNAME, DB_PASSWORD). Then run migrations and seeders:

```bash
php artisan migrate --seed
```

Note: The Laratrust seeder included will create roles and (if enabled in `config/laratrust_seeder.php`) seed users. The seeded admin credentials (development) are:

- Email: `admin@admin.com`
- Password: `password`

If the repository also contains legacy sample credentials you saw earlier (e.g. `lee@gmail.com / 1234`), treat those as test/dev accounts only.

5. Start the local server:

```bash
php artisan serve
```

6. Visit `http://127.0.0.1:8000` and sign in with the seeded admin credentials.

## Usage & Notes
- To re-run seeding / reset sample data, check `config/laratrust_seeder.php` for `truncate_tables` and `create_users` options.
- Keep secrets out of the repository; use `.env` and do not commit it.
- For production, configure a proper database, queue, and storage (use cloud storage for uploads) and enforce HTTPS.

### Navigate through the system and enjoy its customized built-in features.

Cheers!
