FROM php:8.2-apache

# Mover archivos al directorio públic de Apache
COPY . /var/www/html/

# Habilitar el módulo de reescritura de Apache
RUN a2enmod rewrite