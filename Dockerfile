FROM php:8.1-cli-alpine3.15

WORKDIR /tmp/

RUN apk update
RUN apk add --no-cache php8 php8-dev php8-pear php8-pdo php8-openssl
RUN apk add --no-cache autoconf make g++ gnupg unixodbc-dev
RUN apk add --no-cache linux-headers mariadb-dev

# MySQL PDO driver for database connection
RUN docker-php-ext-install pdo_mysql

# 3. Set php.ini (to development settings)
RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
RUN pecl config-set php_ini /usr/local/etc/php/php.ini

# 5. Install php debugger
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

# Serve the app on port 80
EXPOSE 80
CMD ["php", "-S", "0.0.0.0:80", "-t", "/application"]