############################################
# Node Image
############################################
FROM node:22 AS node

RUN npm install -g npm


############################################
# Base Image
############################################

# Learn more about the Server Side Up PHP Docker Images at:
# https://serversideup.net/open-source/docker-php/
FROM serversideup/php:8.2-fpm-nginx-bookworm AS base

## Uncomment if you need to install additional PHP extensions
USER root
RUN install-php-extensions gd imagick intl bcmath exif

############################################
# Development Image
############################################
FROM base AS development

# We can pass USER_ID and GROUP_ID as build arguments
# to ensure the www-data user has the same UID and GID
# as the user running Docker.
ARG USER_ID
ARG GROUP_ID
# Switch to root so we can set the user ID and group ID
USER root

# Set the user ID and group ID for www-data
RUN docker-php-serversideup-set-id www-data $USER_ID:$GROUP_ID  && \
    docker-php-serversideup-set-file-permissions --owner $USER_ID:$GROUP_ID --service nginx

# Drop privileges back to www-data
USER www-data

############################################
# CI image
############################################
FROM base AS ci

# Sometimes CI images need to run as root
# so we set the ROOT user and configure
# the PHP-FPM pool to run as www-data
USER root
RUN echo "user = www-data" >> /usr/local/etc/php-fpm.d/docker-php-serversideup-pool.conf && \
    echo "group = www-data" >> /usr/local/etc/php-fpm.d/docker-php-serversideup-pool.conf

############################################
# Production Image
############################################

FROM base AS deploy

USER root

# Libs required by Node
COPY --from=node /usr/lib /usr/lib
COPY --from=node /usr/local/share /usr/local/share
COPY --from=node /usr/local/lib /usr/local/lib
COPY --from=node /usr/local/include /usr/local/include
COPY --from=node /usr/local/bin /usr/local/bin

COPY --chown=www-data:www-data . /var/www/html

RUN composer install --no-dev --optimize-autoloader

RUN npm install

RUN npm run build && \
    rm -rf /var/www/html/node_modules && \
    rm -rf /var/www/html/public/hot && \
    rm -rf /var/www/html/.github && \
    rm -rf /var/www/html/.gitignore && \
    rm -rf /var/www/html/.gitattributes && \
    rm -rf /var/www/html/docker-compose*.yml && \
    rm -rf /var/www/html/Dockerfile* && \
    rm -rf /var/www/html/README.md && \
    rm -rf /var/www/html/.env.example && \
    rm -rf /var/www/html/.env \

USER www-data

LABEL maintainer="Nelson Alexandre Mutane"
LABEL description="Mimóvel - Real Estate Platform - containerized with Docker"
LABEL email="nelsonmutane@gmail.com"
LABEL repository="github.com/inkomomutane/mim-vel-web-app"
