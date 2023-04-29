FROM amazonlinux:2

# amazon-linux-extras install
RUN amazon-linux-extras install -y epel

# yum update & install
RUN yum update -y \
 && yum install -y \
        systemd \
        httpd

# httpd
RUN systemctl enable httpd

# init
CMD ["/sbin/init"]
