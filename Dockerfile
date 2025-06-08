# Etapa 1: Imagem base para build
FROM php:8.2-fpm as base

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Cria diretório da aplicação
WORKDIR /var/www

# Copia os arquivos da aplicação
COPY . .

# Instala dependências PHP
RUN composer install --no-dev --optimize-autoloader

# Garante que o .env existe (se for copiar do host)
# COPY .env.example .env  # ou se você tiver um .env pronto

# Gera a APP_KEY
RUN php artisan key:generate

# Roda as migrations
RUN php artisan migrate --force

# Permissões
RUN chown -R www-data:www-data /var/www

# Expõe a porta correta
EXPOSE 8000

# Comando para rodar o servidor Laravel
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
