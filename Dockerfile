FROM tutum/apache-php

RUN rm -fr /app
RUN a2enmod rewrite enable
RUN sudo a2enmod rewrite
RUN sudo apache2ctl restart
ADD . /app

#FROM php:5.6-apache
#COPY . /var/www/html/