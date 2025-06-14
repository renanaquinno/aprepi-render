FROM php:8.2-fpm

# Instala dependências básicas do sistema
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    libzip-dev \
    libpq-dev \
    libsqlite3-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libxpm-dev \
    libvpx-dev

# Instala extensões do PHP, incluindo pdo_mysql
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho
WORKDIR /var/www

# Copia os arquivos do projeto
COPY . .

# Instala dependências do Laravel
RUN composer install --optimize-autoloader --no-dev

# Permissões
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

EXPOSE 9000
CMD ["php-fpm"]
