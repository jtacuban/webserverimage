FROM php:fpm-alpine
RUN docker-php-ext-configure pdo_odbc --with-pdo-odbc=unixODBC,/usr \
    && docker-php-ext-install pdo_odbc    
RUN dpkg -i /odbc/ibm-iaccess-1.1.0.28-1.0.amd64.deb
COPY odbc/ /etc/
RUN docker-php-ext-install opcache
COPY php/production/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
COPY data/ /var/www/html/

