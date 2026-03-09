FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN a2dismod mpm_event
RUN a2dismod mpm_worker
RUN a2enmod mpm_prefork

RUN a2enmod rewrite

COPY . /var/www/html/

EXPOSE 80