#!/bin/bash


cd /var/www/html
# Enable Apache modules
#a2enmod rewrite
#a2enmod headers
#a2enmod ext_filter

# Restart Apache to apply changes
service apache2 reload

# Run Laravel migrations if necessary
php artisan cache:clear
php artisan route:cache
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan config:clear
php artisan optimize:clear
php artisan clear-compiled
#composer dump-autoload
php artisan migrate
 php artisan migrate:refresh --seed
php artisan db:seed
#php artisan l5-swagger:generate
#npm i
#npm run build
chmod -R 777 /var/www/html/storage/*
chmod -R 777 /var/www/html/public/*
chmod -R 777 /var/www/html/storage/logs/laravel.log
# Start Apache in the foreground
apachectl -D FOREGROUND


