FROM php:8.0-fpm
ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && apt-get install -y \
    zip \
    git \
    mariadb-client \
    autoconf \
    build-essential \
    libpq-dev \
    libzip-dev

RUN docker-php-ext-install bcmath pdo_mysql zip

# Get latest copy of composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
