FROM php:7.0-apache
RUN apt-get update \
  && apt-get install -y mysql-client curl \
  && docker-php-ext-install pdo_mysql \
  && apt-get clean \
  && rm -rf /var/cache/apt/archives

COPY blog/ /var/www/html/
#CMD php artisan serve
