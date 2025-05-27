FROM php:8.0-apache

RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    default-mysql-client \
    zlib1g-dev \
    libapache2-mod-security2 \
    && docker-php-ext-install pdo_mysql mysqli zip \
    && docker-php-ext-enable pdo_mysql \
    && a2enmod rewrite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \
    && cp /etc/modsecurity/modsecurity.conf-recommended /etc/modsecurity/modsecurity.conf

RUN a2enmod rewrite
