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

## Run

- access on browser: `http://localhost`

## MVC
- `php artisan make:model ChatRoom/ChatMessage -m`
- `php artisan migrate`
- `php artisan make:seeder ChatRoomSeeder`
- `php artisan db:seed`
- `php artisan make:controller ChatController`
