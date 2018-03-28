#! /bin/bash

WORKSPACE=$1

echo "==== Starting Recovery Process of Completed BuildApp tarball ===="

mv /opt/copyuser_files/*.tar.gz $WORKSPACE

chown jenkins:jenkins $WORKSPACE/*.tar.gz

echo "==== Ending Recovery Process of Completed BuildApp tarball ===="
