FROM php:7.0-fpm

RUN apt-get update \
    && apt-get install -y --no-install-recommends vim curl debconf subversion git apt-transport-https apt-utils \
    build-essential locales acl mailutils wget zip unzip \
    gnupg gnupg1 gnupg2
RUN docker-php-ext-install pdo pdo_mysql
COPY php.ini /etc/php/7.0/php.ini
COPY php-fpm-pool.conf /etc/php/7.0/pool.d/www.conf

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

RUN groupadd dev -g 999
RUN useradd dev -g dev -d /home/dev -m

RUN rm -rf /var/lib/apt/lists/*
RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen

# Install PECL extensions
RUN yes | pecl install xdebug-2.5.5 
RUN echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
 && echo "xdebug.default_enable=1" >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo "xdebug.remote_connect_back=1" >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo "xdebug.remote_host='host.docker.internal'" >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo "xdebug.idekey='VSCODE'" >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo "xdebug.remote_log=/usr/local/etc/php/xdebug.log" >> /usr/local/etc/php/conf.d/xdebug.ini \
 && echo "xdebug.remote_autostart=1" >> /usr/local/etc/php/conf.d/xdebug.ini
RUN docker-php-ext-enable xdebug
    
WORKDIR /home/wwwroot/sf2/code

EXPOSE 9000
CMD ["php-fpm"]
