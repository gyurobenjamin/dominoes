FROM php:7.4-cli

WORKDIR /usr/src/dominoes

COPY . /usr/src/dominoes

RUN curl -sS https://getcomposer.org/installer | php \
        && mv composer.phar /usr/local/bin/ \
        && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer
RUN composer dump-autoload

RUN ./vendor/bin/phpunit tests

CMD [ "php", "./run" ]