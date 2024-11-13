# ./deployment/docker/php-cli/Dockerfile

# Базируемся на официальном образе php cli alpine
FROM php:8.2-cli-alpine

# Рабочая директория /app
WORKDIR /app

# Копируем скрипт install-php-extensions от mlocati
# Данный проект рекомендован на официальной странице образов php https://hub.docker.com/_/php
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

# Устанавливаем необходимые расширения
RUN install-php-extensions opcache zip sockets xdebug \
    grpc

# Копируем composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer