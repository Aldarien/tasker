FROM php:7.2-apache
COPY . /var/www/tasker

# RUN ls /var/www/tasker

# RUN chmod -R 777 /var/www/tasker/public
# RUN chmod -R 777 /var/www/tasker/cache

ENV APACHE_DOCUMENT_ROOT /var/www/tasker/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN a2enmod rewrite

RUN docker-php-ext-install mysqli pdo pdo_mysql
