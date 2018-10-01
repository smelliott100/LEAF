FROM php:7-apache
MAINTAINER Nick Ciardiello <nick.ciardiello@ablevets.com>

RUN apt-get update
RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY /docker/php/000-default.conf /etc/apache2/sites-enabled/
COPY /docker/php/apache2.conf /etc/apache2/
COPY /docker/php/docker-php-entrypoint /usr/local/bin/docker-php-entrypoint
COPY /LEAF_Nexus/ /var/www/html/LEAF_Nexus/
COPY /LEAF_Request_Portal/ /var/www/html/LEAF_Request_Portal/
COPY /libs/ /var/www/html/libs/

RUN chmod +x /usr/local/bin/docker-php-entrypoint
RUN chmod +x /var/www/html/
RUN chown -R www-data:www-data /var/www
RUN chmod -R g+rwX /var/www

