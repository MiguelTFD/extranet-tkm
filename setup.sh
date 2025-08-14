#!/bin/bash

mkdir -p docker/nginx
mkdir -p docker/php
mkdir -p docker/mysql
cp .env .env.docker
sed -i 's/DB_HOST=localhost/DB_HOST=mysql/' .env.docker
sed -i 's/APP_URL=http:\/\/localhost/APP_URL=http:\/\/localhost:8080/' .env.docker


docker compose up -d --build

echo "Wait..."
sleep 15


docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan config:cache
docker compose exec app php artisan route:cache
docker compose exec app php artisan storage:link


echo "setting up!"
echo "   - Laravel: http://localhost:8080"
echo "   - PhpMyAdmin: http://localhost:8081"
echo "   - Vite Dev Server: http://localhost:5173"
