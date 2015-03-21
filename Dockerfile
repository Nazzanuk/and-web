#FROM tutum/apache-php

#RUN rm -fr /app
#ADD . /app

FROM php:5.6-apache
COPY . /var/www/html/