FROM tutum/apache-php

COPY .apache2.conf /etc/apache2/
RUN rm -fr /app
RUN a2enmod rewrite
RUN a2enmod rewrite
RUN sudo a2enmod rewrite
RUN sudo apache2ctl restart
RUN sudo service apache2 restart
ADD . /app

#FROM php:5.6-apache
#COPY . /var/www/html/