FROM php:fpm-alpine
RUN apt-get update && apt-get install -y \
    unixodbc-dev \
    && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-configure pdo_odbc --with-pdo-odbc=unixODBC,/usr \
    && docker-php-ext-install pdo_odbc    
RUN sudo dpkg -i /odbc/ibm-iaccess-1.1.0.28-1.0.amd64.deb
COPY odbc/ /etc/