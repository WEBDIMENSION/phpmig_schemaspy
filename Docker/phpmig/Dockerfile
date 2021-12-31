FROM php:7.4-cli

RUN apt-get -y update
RUN apt-get install -y \
    libssl-dev \
    unzip \
    git \
    curl \
    vim \
    gnupg \
  && pecl install xdebug \
  && docker-php-ext-enable xdebug

WORKDIR /app/src

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN docker-php-ext-install pdo_mysql mysqli