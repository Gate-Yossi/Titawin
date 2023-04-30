FROM php:7.4-fpm

# apt-get update & install
RUN apt-get update \
 && apt-get install -y \
    git \
    zip \
    zlib1g-dev \
    libmemcached-dev

# PHP
RUN docker-php-ext-install -j$(nproc) mysqli

# composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY ./CodeIgniter-3.1.13/composer.json /var/www/composer.json

RUN cd /var/www \
 && composer install

# xhprof
RUN cd /tmp \
 && git clone https://github.com/tideways/php-xhprof-extension \
 && cd /tmp/php-xhprof-extension \
 && phpize \
 && ./configure \
 && make \
 && make test \
 && make install

RUN mkdir -vp /var/log/xhprof \
 && chmod 777 /var/log/xhprof

RUN echo 'extension=tideways_xhprof.so'    >> /usr/local/etc/php/conf.d/tideways.ini \
 && echo 'tideways.auto_prepend_library=0' >> /usr/local/etc/php/conf.d/tideways.ini

RUN cd /var/www/ \
 && git clone https://github.com/sters/xhprof-html.git ./xhprof-html \
 && cd ./xhprof-html \
 && sed -i "81c\$xhprof_runs_impl = new XHProfRuns_Default('\/var\/log\/xhprof');" callgraph.php

RUN pecl install redis \
 && docker-php-ext-enable redis

RUN pecl install memcached \
 && docker-php-ext-enable memcached

RUN pecl install xdebug-3.1.6

WORKDIR /var/www
CMD php-fpm
RUN chown www-data:www-data /var/www/
