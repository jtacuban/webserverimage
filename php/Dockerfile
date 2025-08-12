FROM php:fpm-alpine
#RUN docker-php-ext-configure pdo_odbc --with-pdo-odbc=unixODBC,/usr \
#    && docker-php-ext-install pdo_odbc  
RUN apt-get update && apt-get install -y unixodbc unixodbc-dev && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure odbc --with-unixODBC=shared,/usr \
    && docker-php-ext-install odbc  
RUN docker-php-ext-install opcache
COPY php/production/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
COPY data/ /var/www/html/

