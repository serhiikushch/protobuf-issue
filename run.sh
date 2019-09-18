#!/bin/bash
docker build  . -t protobuf_test_lib --build-arg "PROTO_EXT=0"
docker build  . -t protobuf_test_ext --build-arg "PROTO_EXT=1"

echo "Run library tests..."
docker run  -v $PWD:/protobuf protobuf_test_lib:latest  /bin/sh -c "composer run-script test"

echo "Run extension tests..."
docker run  -v $PWD:/protobuf protobuf_test_ext:latest  /bin/sh -c "composer run-script test"
