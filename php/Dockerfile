FROM php:fpm-alpine
RUN apt-get update
RUN apt-get install unixodbc unixodbc-dev
RUN docker-php-ext-install opcache
COPY php/production/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
COPY data/ /var/www/html/