# Use the official PHP Apache image
FROM php:8.1-apache

# Install the mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable mod_rewrite for Apache
RUN a2enmod rewrite

# Copy the source code into the container
COPY ./src /var/www/html/

