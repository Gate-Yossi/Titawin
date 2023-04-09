FROM amazonlinux:2

# amazon-linux-extras install
RUN amazon-linux-extras install -y epel

# yum update & install
RUN yum update -y \
 && yum install -y \
        systemd \
        httpd \
        wget \
        git \
        graphviz

# PHP
RUN yum install -y 'http://rpms.famillecollet.com/enterprise/remi-release-7.rpm'
RUN yum install -y php74
RUN yum install -y php74-php
RUN yum install -y php74-php-fpm
RUN yum install -y php74-php-devel
RUN ln -s /usr/bin/php74 /usr/bin/php \
 && ln -s /opt/remi/php74/root/usr/bin/phpize     /usr/bin/phpize \
 && ln -s /opt/remi/php74/root/usr/bin/php-config /usr/bin/php-config

# xhprof
RUN cd /tmp \
 && git clone https://github.com/tideways/php-xhprof-extension \
 && cd /tmp/php-xhprof-extension \
 && phpize \
 && ./configure \
 && make \
 && make test \
 && make install

RUN mkdir -vp /var/log/xhprof \
 && chmod 777 /var/log/xhprof

RUN echo 'extension=tideways_xhprof.so'    >> /etc/opt/remi/php74/php.d/tideways.ini \
 && echo 'tideways.auto_prepend_library=0' >> /etc/opt/remi/php74/php.d/tideways.ini

RUN cd /var/www/ \
 && git clone https://github.com/sters/xhprof-html.git ./xhprof-html \
 && cd ./xhprof-html \
 && sed -i "81c\$xhprof_runs_impl = new XHProfRuns_Default('\/var\/log\/xhprof');" callgraph.php

# httpd
RUN systemctl enable httpd

# init
CMD ["/sbin/init"]
