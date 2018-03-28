# Apache
#FROM %%DTR_PREFIX%%%%DTR_ORG%%/centos7-nginx:latest

FROM php:7-apache
MAINTAINER "VHA OCC WMS Development Team" https://wiki.mobilehealth.va.gov/display/BPM/

RUN apt-get update
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite
RUN a2enmod ssl
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/certs/leaf.key -out /etc/ssl/certs/leaf.pem -subj "/C=US/ST=VA/L=Chantilly/O=LEAF/OU=LEAF/CN=%"

EXPOSE 80
EXPOSE 443

COPY /docker-leaf /etc/apache2/sites-enabled/
COPY /docker-leaf /etc/apache2/sites-enabled/
COPY /docker-leaf /etc/apache2/
COPY /docker-leaf /usr/local/bin/docker-php-entrypoint

################ ADD app /var/www/html/%%CONTEXT_ROOT%%/%%CONTEXT_VERSION%%/app
ADD ../../../Library/Containers/com.apple.mail/Data/Library/Mail /var/www/html/docker
ADD LEAF_Nexus /var/www/html/LEAF_Nexus
ADD LEAF_Nexus_Tests /var/www/html/LEAF_Nexus_Tests
ADD LEAF_Request_Portal /var/www/html/LEAF_Request_Portal
ADD libs /var/www/html/libs

#ADD docker-leaf /var/www/html/%%CONTEXT_ROOT%%/%%CONTEXT_VERSION%%/app/docker-leaf
#ADD LEAF_Nexus /var/www/html/%%CONTEXT_ROOT%%/%%CONTEXT_VERSION%%/app/LEAF_Nexus
#ADD LEAF_Nexus_Tests /var/www/html/%%CONTEXT_ROOT%%/%%CONTEXT_VERSION%%/app/LEAF_Nexus_Tests
#ADD LEAF_Request_Portal /var/www/html/%%CONTEXT_ROOT%%/%%CONTEXT_VERSION%%/app/LEAF_Request_Portal
#ADD libs /var/www/html/%%CONTEXT_ROOT%%/%%CONTEXT_VERSION%%/app/libs

RUN find /var/www/html/ -type d -exec chmod 755 {} ";"
RUN find /var/www/html/ -type f -exec chmod 644 {} ";"

RUN chmod +x /usr/local/bin/docker-php-entrypoint
#RUN chmod +x /var/www/html/
#RUN chown -R www-data:www-data /var/www
#RUN chmod -R g+rwX /var/www