## urls

https://stackoverflow.com/questions/46877667/how-to-add-a-new-project-to-github-using-vs-code

## Comandos php artisan

php artisan make:filament-resource Property --generate --view --soft-deletes

php artisan migrate:fresh --seed
php artisan make:filament-resource Property --generate --view --soft-deletes
php artisan blueprint:build
php artisan blueprint:erase

## Installation

To set up the schoolMIS application, follow these steps:

1. Clone the repository: `git clone https://github.com/lcevallo/teil.git`
2. Configure environment variables: Run `cd teil && cp .env.example .env` ,
3. Install composer: `composer install`
4. Generate application key: `php artisan key:generate`
5. Run migrations: `php artisan migrate` (This command sets up the database tables based on defined migrations)
6. (Optional) Seed the database: `php artisan db:seed` (This command populates the database with sample data, if available)
7. Run Application `php artisan serve`,
8. Link Storage `php artisan storage:link`

## Usage

The application should be available at `http://127.0.0.1:8000/admin/login`,
You can login with these credentials
Email : `admin@me.com`
Password : `password`
