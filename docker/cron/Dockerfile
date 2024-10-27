FROM php:8.4-rc-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql

COPY crontab /etc/crontabs/root
RUN mkdir /var/log/cron

CMD ["crond", "-f"]

