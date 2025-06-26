# Etapa 1 - PHP
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libonig-dev libxml2-dev zip unzip curl git \
    libzip-dev libfreetype6-dev libjpeg62-turbo-dev libwebp-dev libxpm-dev \
    libicu-dev libpq-dev nginx supervisor \
    && docker-php-ext-install pdo pdo_mysql mbstring exif bcmath zip gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --optimize-autoloader --no-dev

RUN cp .env.example .env && php artisan key:generate

RUN chown -R www-data:www-data /var/www

# Copia configs do nginx e supervisor
COPY ./docker/nginx.conf /etc/nginx/sites-available/default
COPY ./docker/supervisord.conf /etc/supervisord.conf

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
