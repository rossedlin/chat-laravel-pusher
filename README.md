<p align="center">
    <a href="https://www.codewithross.com/" target="_blank">
        <img src="https://assets.edlin.app/logo/codewithross/logo-dark.svg" width="400" alt="Code with Ross Logo">
    </a>
</p>

# Chat Laravel Pusher

I built a Chat Application using Laravel & Pusher where you can chat with all your friends in any location,
just open up the website in your browser and start chatting!
And I built this in within * minutes!

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


- `routes/web.php`


- `app/Http/Controllers/PusherController.php`
    - index()
    - broadcast()
    - receive()


- `app/Events/PusherBroadcast.php`


- Code
    - `resources/views/index.blade.php`
    - `resources/views/broadcast.blade.php`
    - `resources/views/receive.blade.php`

## www.pusher.com

- Create Account
- Create App
- Copy API Keys

## Env

Copy `.env.example` and name `.env` and populate the following API keys

- `BROADCAST_DRIVER`


- `PUSHER_APP_ID`
- `PUSHER_APP_KEY`
- `PUSHER_APP_SECRET`
- `PUSHER_APP_CLUSTER`

## CSS

Copy style css from the live system

- `https://chat.laravel.pusher.edlin.app/style.css`

## Deploy

SFTP to your favourite hosting provider, make sure it's HTTPS.
