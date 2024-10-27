FROM php:8.4-rc-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    vim \
    zip \
    unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www