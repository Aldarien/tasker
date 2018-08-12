FROM php:7.2-apache
COPY . /var/www

ENV APACHE_DOCUMENT_ROOT /var/www/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
# RUN echo 'LogLevel debug rewrite:trace6'>>/etc/apache2/apache2.conf

# RUN sed -ri -e 's!/etc/apache2/mods-available/alias.conf!$# !g' /etc/apache2/apache2.conf
RUN unlink /etc/apache2/mods-enabled/alias.conf

RUN a2enmod rewrite

RUN docker-php-ext-install -j$(nproc) mysqli pdo pdo_mysql
