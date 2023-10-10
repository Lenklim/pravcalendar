FROM phpdockerio/php:8.1-fpm
WORKDIR /var/www

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        php8.1-amqp \
        php8.1-ds \
        php8.1-gd \
        php8.1-imagick \
        php8.1-imap \
        php8.1-bcmath \
        php8.1-intl \
        php8.1-memcached \
        php8.1-mongodb \
        php8.1-mysql \
        php8.1-oauth \
        php8.1-pgsql \
        php8.1-redis \
        php8.1-xdebug \
        php8.1-yaml; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*