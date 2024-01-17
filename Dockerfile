FROM php:8.1

RUN apt-get update && \
    apt-get install -y libzip-dev zip && \
    docker-php-ext-install pdo_mysql zip && \
    a2enmod rewrite

WORKDIR /app
COPY . .
RUN composer install

CMD php artisan serve --host=0.0.0.0
EXPOSE 8000
