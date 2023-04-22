<p align="center">
    <a href="https://www.codewithross.com/" target="_blank">
        <img src="https://assets.edlin.app/logo/codewithross/logo-dark.svg" width="400" alt="Code with Ross Logo">
    </a>
</p>

# Chat Laravel Pusher

---

## Requirements

- PHP v8.1
- Composer v2.5.5
- Web Server (HTTPS)

## Setup

- `composer create-project laravel/laravel chat-laravel-pusher-youtube`
- `cd chat-laravel-pusher-youtube`


- `composer require pusher/pusher-php-server`


- `php artisan make:controller PusherController`
- `php artisan make:event PusherBroadcast`

## Code

- `app/Http/Controllers/PusherController.php`
  - index()
  - broadcast()
  - message()

[//]: # (- `config/stripe.php`)

- `routes/web.php`


- `resources/views/*`
  - `resources/views/index.blade.php`
  - `resources/views/left.blade.php`
  - `resources/views/right.blade.php`

## Env

Copy `.env.example` and name `.env` and populate the following API keys

- `STRIPE_TEST_SK`
- `STRIPE_TEST_PK`
- `STRIPE_LIVE_SK`
- `STRIPE_LIVE_PK`


## CSS

Copy style css from the live system

- `https://chat.laravel.pusher.edlin.app/style.css`



## Deploy

SFTP to your favourite hosting provider, make sure it's HTTPS.
