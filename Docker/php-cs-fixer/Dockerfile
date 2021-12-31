FROM php:7.4-cli

RUN apt-get -y update
RUN apt-get install -y \
    libssl-dev \
    unzip \
    git \
    curl \
    vim \
    gnupg

WORKDIR /app/src
# Use the default production configuration
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN composer require --dev friendsofphp/php-cs-fixer

RUN composer install