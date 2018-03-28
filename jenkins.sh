#!/bin/bash

#source jenkins env file
source jenkins.env

#replace information in Leaf nexus globals.php
sed -i  '' -e "s/HOSTNAME/$HOSTNAME/g" LEAF_Nexus/globals.php
sed -i  '' -e "s/DB_NAME/$DB_NAME/g" LEAF_Nexus/globals.php
sed -i  '' -e "s/USERNAME/$USERNAME/g" LEAF_Nexus/globals.php
sed -i  '' -e "s/PASSWORD/$PASSWORD/g" LEAF_Nexus/globals.php

#Rename config file
cp LEAF_Nexus/config-example.php LEAF_Nexus/config.php

#replace information in Leaf Nexus config.php
sed -i  '' -e "s/SERVER_HOSTNAME/$SERVER_HOSTNAME/g" LEAF_Nexus/config.php
sed -i  '' -e "s/DATABASE_NAME/$DATABASE_NAME/g" LEAF_Nexus/config.php
sed -i  '' -e "s/DATABASE_USERNAME/$DATABASE_USERNAME/g" LEAF_Nexus/config.php
sed -i  '' -e "s/DATABASE_PASSWORD/$DATABASE_PASSWORD/g" LEAF_Nexus/config.php
sed -i  '' -e "s/CONFIG_USER/$CONFIG_USER/g" LEAF_Nexus/config.php

#replace information in Leaf Request portal globls.php
sed -i  '' -e "s/LRP_HOSTNAME/$LRP_HOSTNAME/g" LEAF_Request_Portal/globals.php
sed -i  '' -e "s/LRP_DB_NAME/$LRP_DB_NAME/g" LEAF_Request_Portal/globals.php
sed -i  '' -e "s/LRP_USERNAME/$LRP_USERNAME/g" LEAF_Request_Portal/globals.php
sed -i  '' -e "s/LRP_PASSWORD/$LRP_PASSWORD/g" LEAF_Request_Portal/globals.php

#Rename config file 
cp LEAF_Request_Portal/db_config-example.php LEAF_Request_Portal/db_config.php

#replace information in Leaf Reqeust portal dbconfig
sed -i  '' -e "s/LRP_SERVER_HOSTNAME/$LRP_SERVER_HOSTNAME/g" LEAF_Request_Portal/globals.php
sed -i  '' -e "s/LRP_DATABASE_NAME/$LRP_DATABASE_NAME/g" LEAF_Request_Portal/globals.php
sed -i  '' -e "s/LRP_DATABASE_USERNAME/$LRP_DATABASE_USERNAME/g" LEAF_Request_Portal/globals.php
sed -i  '' -e "s/LRP_DATABASE_PASSWORD/$LRP_DATABASE_PASSWORD/g" LEAF_Request_Portal/globals.php
sed -i  '' -e "s/LRP_phoneSERVER_HOSTNAME/$LRP_phoneSERVER_HOSTNAME/g" LEAF_Request_Portal/globals.php
sed -i  '' -e "s/LRP_phoneDATABASE_NAME/$LRP_phoneDATABASE_NAME/g" LEAF_Request_Portal/globals.php
sed -i  '' -e "s/LRP_phoneDATABASE_USERNAME/$LRP_phoneDATABASE_USERNAME/g" LEAF_Request_Portal/globals.php
sed -i  '' -e "s/LRP_phoneDATABASE_PASSWORD/$LRP_phoneDATABASE_PASSWORD/g" LEAF_Request_Portal/globals.php

cd docker
docker-compose build
docker-compose up
