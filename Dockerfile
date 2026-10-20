# syntax=docker/dockerfile:1

FROM node:22-bookworm-slim AS assets
WORKDIR /build
COPY package.json package-lock.json ./
RUN npm ci --no-audit --no-fund
COPY resources ./resources
COPY vite.config.js ./vite.config.js
RUN npm run build

FROM php:8.3-fpm-bookworm AS php-base
ARG PHP_BUILD_JOBS=2
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git unzip libfcgi-bin libicu-dev libzip-dev \
        libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"${PHP_BUILD_JOBS}" bcmath gd intl pdo_mysql zip
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
COPY docker/php.ini /usr/local/etc/php/conf.d/zz-tigac.ini
COPY docker/fpm.conf /usr/local/etc/php-fpm.d/zz-tigac.conf
WORKDIR /var/www/html

FROM php-base AS application
ENV COMPOSER_ALLOW_SUPERUSER=1
COPY composer.json composer.lock ./
RUN --mount=type=cache,target=/tmp/composer-cache \
    COMPOSER_CACHE_DIR=/tmp/composer-cache composer install --prefer-dist --no-interaction --no-progress --no-scripts --no-autoloader
COPY . .
COPY --from=assets /build/public/build ./public/build
RUN mkdir -p storage/app/public storage/framework/cache/data storage/framework/sessions \
        storage/framework/views storage/logs bootstrap/cache \
    && composer dump-autoload --optimize --no-scripts \
    && php artisan package:discover --ansi \
    && ln -s /var/www/html/storage/app/public public/storage

FROM php-base AS app
COPY --from=application --chown=www-data:www-data /var/www/html /var/www/html
COPY --chmod=755 docker/entrypoint.sh /usr/local/bin/tigac-entrypoint
COPY --chmod=755 docker/healthcheck.sh /usr/local/bin/tigac-healthcheck
USER www-data
ENTRYPOINT ["tigac-entrypoint"]
CMD ["php-fpm"]

FROM nginx:stable-alpine AS web
COPY docker/nginx.conf /etc/nginx/conf.d/default.conf
COPY --from=application /var/www/html/public /var/www/html/public
RUN mkdir -p /var/www/html/storage/app/public
