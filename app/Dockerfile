FROM amazonlinux:2

# amazon-linux-extras install
RUN amazon-linux-extras install -y epel

# yum update & install
RUN yum update -y \
 && yum install -y \
        systemd \
        httpd

# PHP
RUN yum install -y 'http://rpms.famillecollet.com/enterprise/remi-release-7.rpm'
RUN yum install -y php74
RUN yum install -y php74-php
RUN yum install -y php74-php-fpm
RUN ln -s /usr/bin/php74 /usr/bin/php

# httpd
RUN systemctl enable httpd

# init
CMD ["/sbin/init"]
