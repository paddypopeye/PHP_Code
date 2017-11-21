FROM ubuntu:14.04
EXPOSE 80
COPY Ecommerce.sql /root

RUN apt-get update \
 && apt-get install wget -yq \
 && wget https://www.apachefriends.org/xampp-files/7.1.11/xampp-linux-x64-7.1.11-0-installer.run \
 && mv xampp-linux-x64-7.1.11-0-installer.run /opt/ \
 && cd /opt/ \
 && chmod +x xampp-linux-x64-7.1.11-0-installer.run \
 && printf 'y\n\y\n\r\n\y\n\r\n' | ./xampp-linux-x64-7.1.11-0-installer.run \
 && cd /opt/lampp/htdocs \
 && mkdir -p Ecommerce \
 && chmod 7777 /opt/lampp/htdocs/Ecommerce \
 && cd /opt/lampp/bin \
 && /opt/lampp/lampp start \
 && sleep 15s \
 && ./mysql -uroot -e "CREATE DATABASE Ecommerce" \
 && ./mysql -uroot -D Ecommerce < /root/Ecommerce.sql \
 && sed -i -e 's/Require local/Require all granted/g' /opt/lampp/etc/extra/httpd-xampp.conf \
 && cd / \
 && /opt/lampp/lampp reload

COPY /Ecommerce /opt/lampp/htdocs/Ecommerce

RUN sed -i -e 's/\"http:\/\/localhost\/Ecommerce\/paypal_success.php\"/\"http:\/\/localhost:8000\/Ecommerce\/paypal_success.php\"/g' /opt/lampp/htdocs/Ecommerce/payment.php  \
 && sed -i -e 's/\"http:\/\/localhost\/Ecommerce\/paypal_cancel.php\"/\"http:\/\/localhost:8000\/Ecommerce\/paypal_cancel.php\"/g' /opt/lampp/htdocs/Ecommerce/payment.php

CMD /bin/bash tail -f /dev/null
CMD /opt/lampp/lampp start

