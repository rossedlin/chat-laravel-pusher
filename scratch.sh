
#
# Shutdown this docker
#
docker compose down
docker container prune -f

#
# Shutdown scratch docker
#
if [ -e ~/Projects/chat-laravel-pusher-scratch ]; then
    cd ~/Projects/chat-laravel-pusher-scratch || exit;

    docker compose down
    docker container prune -f
fi

#
# Purge scratch
#
cd ~/Projects || exit 1;
rm -Rf ~/Projects/chat-laravel-pusher-scratch

#
# Install
#
composer create-project laravel/laravel=11.* chat-laravel-pusher-scratch
cd ~/Projects/chat-laravel-pusher-scratch || exit 1;

#
# Git (pre)
#
git init
git add .
git commit -m "Init"

#
# Docker (Setup)
#
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/docker-compose.yml -o docker-compose.yml
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/up.sh -o up.sh
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/down.sh -o down.sh
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/bash.sh -o bash.sh

chmod +x *.sh

git add .
git commit -m "Docker"

#
# Artisan
#
docker compose run --rm web bash -c "php artisan install:broadcasting"
docker compose run --rm web bash -c "php artisan make:model File"
docker compose run --rm web bash -c "php artisan make:event PusherBroadcast"

#
# Composer
#
docker compose run --rm web bash -c "composer require pusher/pusher-php-server"

#
# GitHub Overrides
#
cd ~/Projects/chat-laravel-pusher-scratch || exit 1;
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/.env.example -o ./.env.example
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/routes/web.php -o ./routes/web.php
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/app/Http/Controllers/PusherController.php -o ./app/Http/Controllers/PusherController.php
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/app/Events/PusherBroadcast.php -o ./app/Events/PusherBroadcast.php
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/resources/views/index.blade.php -o ./resources/views/index.blade.php
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/resources/views/broadcast.blade.php -o ./resources/views/broadcast.blade.php
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/resources/views/receive.blade.php -o ./resources/views/receive.blade.php
curl -H 'Cache-Control: no-cache, no-store' https://raw.githubusercontent.com/rossedlin/chat-laravel-pusher/master/public/style.css -o ./public/style.css

#
# Git (post)
#
git add .

#
# Docker (Run)
#
#docker compose up -d
