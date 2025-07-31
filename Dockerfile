FROM php:8.2-apache

# Mover archivos al directorio públic de Apache
COPY . /var/www/html/

# Crea un directorio de archivos para subir imágenes
RUN mkdir -p /var/www/html/archivos \
    && chown -R www-data:www-data /var/www/html/archivos \
    && chmod -R 755 /var/www/html/archivos

# Habilitar el módulo de reescritura de Apache
RUN a2enmod rewrite