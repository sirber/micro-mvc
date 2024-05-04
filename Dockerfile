FROM php:8.3-apache

# Configure Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN a2enmod rewrite
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN sed -i '/<Directory ${APACHE_DOCUMENT_ROOT}>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Configure PHP
RUN docker-php-ext-install pdo_mysql
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_pgsql
