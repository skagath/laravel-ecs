FROM php:8.2.0-apache

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip 

COPY ./apache/site.conf /etc/apache2/sites-available/000-default.conf 

#RUN a2dissite 000-default.conf && a2ensite 000-default.conf

RUN a2enmod rewrite

RUN php -r "copy('http://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html

COPY . .

# Dockerfile example
COPY apache/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/vendor


EXPOSE 8000

ENTRYPOINT ["/usr/local/bin/start.sh"]
