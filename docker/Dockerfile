FROM php:7.4-apache

MAINTAINER jeffersonassilva@gmail.com

COPY . /var/www/html/
RUN chmod -R a+r /var/www/html/

# Install PHP extensions and PECL modules.
RUN buildDeps=" \
        default-libmysqlclient-dev \
        libbz2-dev \
        libmemcached-dev \
        libsasl2-dev \
    " \
    runtimeDeps=" \
        curl \
        git \
        libfreetype6-dev \
        libicu-dev \
        libjpeg-dev \
        libldap2-dev \
        libmemcachedutil2 \
        libpng-dev \
        libpq-dev \
        libxml2-dev \
    " \
    && apt-get update \
    && apt-get install -y vim \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y $buildDeps $runtimeDeps

RUN docker-php-ext-install bcmath bz2 calendar iconv intl mysqli opcache pdo_mysql pdo_pgsql pgsql soap
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/
RUN docker-php-ext-install ldap
RUN docker-php-ext-install exif
RUN pecl install memcached redis
RUN docker-php-ext-enable memcached.so redis.so
RUN apt-get purge -y --auto-remove $buildDeps
RUN rm -r /var/lib/apt/lists/*
RUN a2enmod rewrite

# Install Composer.
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && ln -s $(composer config --global home) /root/composer
ENV PATH=$PATH:/root/composer/vendor/bin COMPOSER_ALLOW_SUPERUSER=1

RUN echo "upload_max_filesize = 256M" >> /usr/local/etc/php/conf.d/docker-php-filesize.ini
RUN echo 'post_max_size = 260M' >> /usr/local/etc/php/conf.d/docker-php-maxsize.ini
RUN echo 'memory_limit = -1' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini

EXPOSE 80
