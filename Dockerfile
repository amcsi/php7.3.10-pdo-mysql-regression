FROM php:7.3.10

RUN apt-get update && apt-get install -y unzip libpng-dev libjpeg62-turbo-dev
RUN docker-php-ext-install pdo_mysql

WORKDIR /src
RUN cd /var/www

COPY . .

CMD ["php", "example.php"]

