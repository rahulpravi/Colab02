FROM php:8.2-apache

# Copy source code
COPY . /var/www/html/

# Enable Apache Rewrite Module (optional)
RUN a2enmod rewrite
