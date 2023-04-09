FROM amazonlinux:2

# yum update & install
RUN yum update -y \
 && yum install -y \
        systemd \
        httpd

# httpd
RUN systemctl enable httpd

# init
CMD ["/sbin/init"]
