FROM php:8.1.1-apache

RUN a2enmod rewrite

RUN sed -i '/LoadModule rewrite_module/s/^#//g' /etc/apache2/apache2.conf

RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

RUN docker-php-ext-install mysqli pdo_mysql