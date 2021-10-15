FROM php:7.2-fpm

# this is a prod Dockerfile

ENV DEBIAN_FRONTEND noninteractive

ADD ./ /app
WORKDIR /app

# install basic tools and php-related libraries
RUN apt-get update && apt-get install -y \
  wget \
  curl \
  git \
  gettext-base \
  zlib1g-dev \
  libssl-dev \
  libzip-dev \
  libmcrypt-dev \
  libcurl4-gnutls-dev \
  cron \
  zip \
  locales \
  libpq-dev \
  libpng-dev \
  libjpeg-dev \
  libwebp-dev \
  && docker-php-ext-configure gd --with-jpeg-dir=/usr --with-webp-dir=/usr \
  && docker-php-ext-install -j$(nproc) opcache zip curl pdo pgsql pdo_pgsql pdo_mysql gd \
  && curl -sS https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
  && crontab -l | cat - ./docker/src/backend/schedule.txt >crontab.txt && crontab crontab.txt
