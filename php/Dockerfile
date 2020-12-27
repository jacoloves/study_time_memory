FROM php:7.4-fpm
MAINTAINER stanaka

RUN apt-get update && apt-get install -y libmcrypt-dev mariadb-client libonig-dev \
    && docker-php-ext-install pdo_mysql mysqli && \
    #vim
    apt-get install -y vim curl && \
    #openssl
    apt-get install -y openssl

WORKDIR /usr/share/nginx/html
