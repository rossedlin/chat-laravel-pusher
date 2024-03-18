
docker compose down
docker container prune -f

if [ -e ~/Projects/chat-laravel-pusher-scratch ]; then
    cd ~/Projects/chat-laravel-pusher-scratch || exit;

    docker compose down
    docker container prune -f
fi

cd ~/Projects || exit;
rm -Rf ~/Projects/chat-laravel-pusher-scratch

## Install

composer create-project laravel/laravel=10.* chat-laravel-pusher-scratch
cd ~/Projects/chat-laravel-pusher-scratch || exit;

## Git (pre)

git init
git add .
git commit -m "Init"

## Docker (Setup)
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/docker-compose.yml -o docker-compose.yml
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/up.sh -o up.sh
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/down.sh -o down.sh
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/bash.sh -o bash.sh

chmod +x ./*.sh

git add .
git commit -m "Docker"

#
# Composer
#
docker compose run --rm web bash -c "composer require pusher/pusher-php-server"

#
# Artisan
#
docker compose run --rm web bash -c "php artisan make:controller PusherController"
docker compose run --rm web bash -c "php artisan make:event PusherBroadcast"

#
# GitHub Overrides
#
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/routes/web.php -o ./routes/web.php

curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/app/Http/Controllers/PusherController.php -o ./app/Http/Controllers/PusherController.php
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/app/Events/PusherBroadcast.php -o ./app/Events/PusherBroadcast.php

curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/resources/views/index.blade.php -o ./resources/views/index.blade.php
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/resources/views/left.blade.php -o ./resources/views/left.blade.php
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/resources/views/right.blade.php -o ./resources/views/right.blade.php

curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/public/style.css -o ./public/style.css

#
# Env
#
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/.env.example -o ./.env.example
docker compose run --rm web bash -c "rm .env; cp .env.example .env; php artisan key:generate"

#
# Git (post)
#
git add .

#
# Docker (Run)
#
docker compose up -d
