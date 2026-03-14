FROM php:8.3-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
git \
unzip \
libzip-dev \
zip \
libpq-dev \
&& docker-php-ext-install zip pdo pdo_pgsql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader

EXPOSE 8080

CMD ["sh", "-c", "php -S 0.0.0.0:$PORT -t public"]
