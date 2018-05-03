FROM php:7.2-cli-stretch
RUN apt-get update \
  && apt-get install -y mysql-client curl \
  && docker-php-ext-install pdo_mysql \
  && apt-get clean \
  && rm -rf /var/cache/apt/archives

COPY . /var/www/
COPY index.php /var/www/html/
WORKDIR /var/www/blog
EXPOSE 8080

ENTRYPOINT ./init.sh &&  php artisan serve --port 8080 --host 0.0.0.0
