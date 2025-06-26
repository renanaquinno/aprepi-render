FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev libjpeg-dev libonig-dev libxml2-dev zip unzip curl git libzip-dev \
    libpq-dev libsqlite3-dev libfreetype6-dev libjpeg62-turbo-dev libwebp-dev \
    libxpm-dev libvpx-dev libmcrypt-dev libicu-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

RUN composer install --optimize-autoloader --no-dev
RUN php artisan key:generate

RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]
