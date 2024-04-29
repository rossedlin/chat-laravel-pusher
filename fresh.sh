
#
# Cleanup
#
docker container prune -f
rm -R node_modules
rm -R vendor
rm composer.lock
rm yarn.lock

#
# Install
#
docker compose run --rm web composer install
docker compose run --rm web yarn install

#
# Build
#
docker compose run --rm web yarn sass -q resources/scss/style.scss public/style.css

#
# Git
#
git add .
