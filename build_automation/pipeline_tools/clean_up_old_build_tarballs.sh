#! /bin/bash

find /opt/copyuser_files -maxdepth 1 -type f -iname "*.tar.gz" -exec rm -f {} \;
find /var/lib/jenkins/workspace -maxdepth 2 -type f -iname "*.tar.gz" -exec rm -f {} \;