FROM php:8.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
  git \
  curl \
  zip \
  unzip

RUN docker-php-ext-install pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
