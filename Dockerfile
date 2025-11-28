# --------------------------------------------------
# STAGE 1: Build de Assets con Node
# --------------------------------------------------
FROM node:20-alpine AS node_builder
WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY . .
RUN npm run build


# --------------------------------------------------
# STAGE 2: Instalar dependencias PHP (Composer)
# --------------------------------------------------
FROM php:8.2-fpm-alpine AS composer_builder

# Dependencias necesarias para PHP + Composer
RUN apk add --no-cache \
    git unzip icu-dev oniguruma-dev zlib-dev libzip-dev sqlite-dev

# Extensiones PHP necesarias por Laravel
RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl mbstring zip pdo_mysql pdo_sqlite

# Copiar composer desde la imagen oficial
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copiar el proyecto generado por Node
COPY --from=node_builder /app /app

# Instalar dependencias PHP sin dev
RUN composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction


# --------------------------------------------------
# STAGE 3: Imagen Final
# --------------------------------------------------
FROM php:8.2-fpm-alpine

# Dependencias del sistema y extensiones PHP
RUN set -eux; \
    apk update; \
    apk add --no-cache --virtual .build-deps $PHPIZE_DEPS icu-dev oniguruma-dev libzip-dev sqlite-dev zlib-dev openssl-dev; \
    apk add --no-cache icu git unzip curl bash zip; \
    docker-php-ext-configure intl; \
    docker-php-ext-install -j"$(nproc)" pdo_mysql pdo_sqlite bcmath intl mbstring zip; \
    docker-php-ext-enable opcache; \
    apk del .build-deps

WORKDIR /var/www/html

# Copiar aplicación y dependencias instaladas
COPY --from=composer_builder /app /var/www/html

# Preparar Laravel
RUN if [ ! -f .env ]; then cp .env.example .env; fi \
    && php artisan key:generate \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Permisos correctos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

USER www-data

EXPOSE 9000
CMD ["php-fpm"]
