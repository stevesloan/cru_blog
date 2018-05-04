FROM php:7.2-cli-stretch
RUN apt-get update \
  && apt-get install -y mysql-client curl \
  && docker-php-ext-install pdo_mysql \
  && apt-get clean \
  && rm -rf /var/cache/apt/archives
EXPOSE 8080

COPY . /var/www/
COPY blog/.env.docker /var/www/blog/.env
WORKDIR /var/www/blog
ENTRYPOINT ./init.sh &&  php artisan serve --port 8080 --host 0.0.0.0
