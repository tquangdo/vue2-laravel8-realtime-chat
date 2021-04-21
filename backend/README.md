# BACKEND

## Install
- `composer require laravel/sanctum`
- `php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"`
- `composer require laravel/jetstream`
- `php artisan jetstream:install inertia`
- `php artisan migrate`
- `cd backend`
- `backend % npm i`
- `php artisan vendor:publish --tag=jetstream-views`
- `backend % npm run hot`