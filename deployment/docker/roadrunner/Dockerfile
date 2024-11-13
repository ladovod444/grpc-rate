# ./deployment/docker/roadrunner/Dockerfile

# Базируемся на официальном образе php cli alpine
FROM php:8.2-cli-alpine

# Рабочая директория /app
WORKDIR /app

# Копируем скрипт install-php-extensions от mlocati
# Данный проект рекомендован на официальной странице образов php https://hub.docker.com/_/php
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

# Устанавливаем необходимые расширения
RUN install-php-extensions opcache zip sockets \
    protobuf \
    xdebug \
    # Устанавливаем утилиту protoc
    && apk update && apk add --no-cache make protobuf-dev

# Копируем composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Команда и аргументы запуска
# Используем бинарник Roadrunner и конфиг из корня проекта
# Корень проекта будет смонтирован при запуске в /app
CMD ["/app/rr", "serve", "-d", "-c", "/app/.rr.yaml"]