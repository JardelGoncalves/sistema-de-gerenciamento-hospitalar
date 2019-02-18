FROM php:7.2-apache

MAINTAINER Jardel Goncalves <jardelgoncalves1996@gmail.com>

RUN apt-get update

# Instalar drive do postgres
RUN apt-get install -y libpq-dev 2> /dev/null\
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql 2> /dev/null \
    && docker-php-ext-install pdo_pgsql pgsql 2> /dev/null
