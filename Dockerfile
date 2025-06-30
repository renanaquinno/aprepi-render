FROM php:8.2-fpm

# Instala extensões e dependências necessárias
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip unzip curl git libzip-dev \
    libpq-dev libsqlite3-dev \
    libfreetype6-dev libjpeg62-turbo-dev \
    libwebp-dev libxpm-dev libvpx-dev \
    libicu-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --optimize-autoloader --no-dev

# Exponha a porta 9000 para o PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
