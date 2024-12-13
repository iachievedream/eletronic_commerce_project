#!/bin/bash
composer install
# php artisan key:generate
# php artisan jwt:secret
php artisan route:cache
php artisan config:cache
php artisan config:clear
php artisan cache:clear
composer dump-autoload
php artisan optimize
php artisan view:clear

php artisan route:clear
php artisan route:cache
php artisan config:cache
php artisan config:clear
php artisan cache:clear

# mkdir -p docker/nginx/ssl
# openssl req -x509 -newkey rsa:4096 -nodes -keyout docker/nginx/ssl/certificate.key -out docker/nginx/ssl/certificate.crt -days 365
