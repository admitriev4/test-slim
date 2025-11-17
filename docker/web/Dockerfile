FROM phpdockerio/php:8.2-fpm

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
    php8.2-mbstring \
    php8.2-mysql \
    php8.2-intl \
    php8.2-interbase \
    php8.2-imagick \
    php8.2-opcache \
    php8.2-zip \
    php-pear php8.2-dev libmcrypt-dev gcc make autoconf libc-dev pkg-config \
    && pecl install mcrypt-1.0.6 \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN apt-get update
RUN apt-get install -y nginx supervisor

RUN usermod -u 1000 www-data
RUN usermod -aG root www-data

WORKDIR "/var/www/html"

CMD ["/usr/bin/supervisord", "-c",  "/etc/supervisord.conf"]