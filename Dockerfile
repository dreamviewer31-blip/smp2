FROM php:8.2-cli

RUN apt-get update && apt-get install -y libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app
COPY . /app/

RUN chmod -R 755 /app

CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-8080} -t /app"]
