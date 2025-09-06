# Stage 1  - Base image
ARG PHP_VERSION=8.2
FROM php:${PHP_VERSION}-fpm AS base_image

RUN apt-get update && apt-get install -y --no-install-recommends  \
    build-essential \
    curl \
    unzip \
    libpq-dev \
    libonig-dev \
    libssl-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    libicu-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libgd-dev \
    jpegoptim \
    gifsicle \
    optipng \
    pngquant \
    && docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    opcache \
    intl \
    zip \
    bcmath \
    soap \
    exif \
    pcntl \
    pcntl \
    mbstring\
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apt-get autoremove -y && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg

RUN docker-php-ext-install -j$(nproc) gd

# Set the working directory inside the container
WORKDIR /var/www/html

COPY ./app /var/www/html

# Install Composer and dependencies
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN  composer install --no-dev --optimize-autoloader --no-interaction --no-progress --prefer-dist

# Build application assets

FROM node:22 AS node_builder


RUN apt-get update && apt-get install -y \
    php${PHP_VERSION}-cli \
    php${PHP_VERSION}-mbstring \
    unzip \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY --from=base_image /var/www/html /var/www/html


RUN npm install

RUN npm run build

RUN rm -rf node_modules

FROM base_image AS final_image

COPY --from=node_builder /var/www/html /var/www/html
COPY ./docker/dev/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

#COPY --from=base_image --chown=forge:forge /var/www/html /var/www/html


WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html

USER www-data

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

COPY ./docker/dev/php/uploads.ini /etc/php/${PHP_VERSION}/cli/conf.d/99-php.ini

EXPOSE 9000

CMD ["php-fpm"]