FROM php:8.5-fpm-alpine

WORKDIR /var/www/html

RUN apk add --no-cache libpq \
    && apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        postgresql-dev \
    && docker-php-ext-install \
        pdo_pgsql \
        pcntl \
        posix \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apk del .build-deps

COPY --from=composer:2.10 /usr/bin/composer /usr/bin/composer

ARG APP_UID=1000
ARG APP_GID=1000

RUN addgroup -g ${APP_GID} appgroup \
    && adduser -D -u ${APP_UID} -G appgroup appuser \
    && sed -i 's/^user = www-data/user = appuser/' /usr/local/etc/php-fpm.d/www.conf \
    && sed -i 's/^group = www-data/group = appgroup/' /usr/local/etc/php-fpm.d/www.conf
