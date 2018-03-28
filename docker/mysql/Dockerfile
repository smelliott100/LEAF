FROM mysql/mysql-server
MAINTAINER Nick Ciardiello <nick.ciardiello@ablevets.com>

ENV MYSQL_ROOT_PASSWORD tester

COPY ./orgchart_boilerplate_empty.sql /
COPY ./resource_database_boilerplate.sql /
COPY setup_database.sh /docker-entrypoint-initdb.d/setup_database.sh
