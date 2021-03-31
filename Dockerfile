FROM php:7.2-apache-stretch
COPY devops /var/www/html/
EXPOSE 80
RUN docker-php-ext-install mysqli  && \
    echo "ServerName localhost" >> /etc/apache2/apache2.conf  
  
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
