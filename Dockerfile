FROM ubuntu:18.04

ARG PROTO_EXT

WORKDIR /tmp
RUN export DEBIAN_FRONTEND=noninteractive && apt-get update && \
    apt install -y software-properties-common && \
    add-apt-repository ppa:ondrej/php && \
    apt-get update && \
    apt-get install -y \
    git \
    zip \
    autoconf \
    build-essential \
    libtool \
    curl \
    php7.3-fpm \
    php7.3-mbstring \
    php-pear \
    php-dev \
    zlib1g-dev && \
    curl -s https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer && \
    pecl install grpc-1.23.0 && \
    printf "\nextension=grpc.so\n" >> /etc/php/7.3/cli/php.ini && \
    curl -OL "https://github.com/protocolbuffers/protobuf/releases/download/v3.9.1/protoc-3.9.1-linux-x86_64.zip"  && \
        unzip -o protoc-3.9.1-linux-x86_64.zip -d /usr/local && \
        rm -f protoc-3.9.1-linux-x86_64.zip && \
    cd /tmp && git clone -b v1.23.0 --depth 1 https://github.com/grpc/grpc && \
    cd /tmp/grpc && \
    git submodule update --init && \
    make grpc_php_plugin

RUN if [ "$PROTO_EXT" = "1" ] ; then pecl install protobuf-3.9.1 && printf "\nextension=protobuf.so\n" >> /etc/php/7.3/cli/php.ini ; fi

WORKDIR /protobuf

