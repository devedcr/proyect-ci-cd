FROM php:apache
COPY public/ /var/www/html/
COPY / /var/www/html/
ENV API_URL = http://127.0.0.1
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql
RUN a2enmod rewrite
EXPOSE 80
