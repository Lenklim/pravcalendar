FROM phpdockerio/php:8.1-fpm
WORKDIR /var/www
RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        php8.1-amqp \
        php8.1-bcmath \
        php8.1-ds \
        php8.1-gd \
        php8.1-imagick \
        php8.1-imap \
        php8.1-intl \
        php8.1-memcached \
        php8.1-mongodb \
        php8.1-mysql \
        php8.1-oauth \
        php8.1-pgsql \
        php8.1-redis \
        php8.1-xdebug \
        php8.1-yaml \
        librabbitmq-dev \
        libssh-dev \
        libpng-dev \
        wget; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*


## Install git
RUN apt-get update \
    && apt-get -y install sudo git telnet curl \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*\
    && git config --global user.name 'System'\
    && git config --global user.email 'system@aronix.ru'


RUN curl -sL https://deb.nodesource.com/setup_16.x  | bash -
RUN apt-get -y install nodejs \
	&& npm -g install npm@latest-2 \
    && npm -g install yarn

RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash

RUN apt -y install symfony-cli




RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
RUN chsh -s /bin/bash www-data









#USER 1000:1000
#
#CMD ["php-fpm"]

#FROM php:7.4-fpm
#RUN apt-get update && apt-get install -y \
#        librabbitmq-dev \
#        libssh-dev \
#        libpng-dev \
#        wget \
#
#
#
#ARG DEBIAN_FRONTEND=noninteractive





#
#
##mysql pdo_mysql
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#
## Install git
#RUN apt-get update \
#    && apt-get -y install git telnet \
#    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*\
#    && git config --global user.name 'System'\
#    && git config --global user.email 'system@aronix.ru'
#
#
#RUN curl -sS https://get.symfony.com/cli/installer | bash && \
#	mv "/root/.symfony/bin/symfony" "/usr/local/bin/symfony" && \
#	chmod +x "/usr/local/bin/symfony"
#
#
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#
#RUN apt-get -y install curl
#RUN curl -sL https://deb.nodesource.com/setup_12.x  | bash -
#RUN apt-get -y install nodejs \
#	&& npm -g install npm@latest-2 \
#	&& npm -g install yarn
#
#
#ADD xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
#
##RUN wget https://getcomposer.org/installer -O - -q \
##    | php -- --install-dir=/bin --filename=composer --quiet
#
#RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
#
#WORKDIR /var/www
#
#USER 1000:1000
#
#CMD ["php-fpm"]


#ARG DEBIAN_FRONTEND=noninteractive
#
#
## Install selected extensions and other stuff
#RUN apt-get update \
#    && apt-get -y --no-install-recommends install curl apt-utils php-memcached php7.4-cli php7.4-mysql php-yaml \
#    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
#
#RUN apt-get update && apt-get install -y --no-install-recommends libpng-dev libzip-dev
#
#RUN docker-php-ext-install zip
#RUN docker-php-ext-install mysqli pdo_mysql
##mysql pdo_mysql
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#
## Install git
#RUN apt-get update \
#    && apt-get -y install git telnet \
#    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*\
#    && git config --global user.name 'System'\
#    && git config --global user.email 'system@aronix.ru'


#RUN curl -sS https://get.symfony.com/cli/installer | bash && \
#	mv "/root/.symfony/bin/symfony" "/usr/local/bin/symfony" && \
#	chmod +x "/usr/local/bin/symfony"

# Ставим Composer'а.
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#
#RUN apt-get -y install curl
#RUN curl -sL https://deb.nodesource.com/setup_12.x  | bash -
#RUN apt-get -y install nodejs \
#	&& npm -g install npm@latest-2 \
#	&& npm -g install yarn



# Указываем рабочую директорию для PHP


