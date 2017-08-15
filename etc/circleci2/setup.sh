#!/bin/sh

set -e -x

echo "127.0.0.1 www.social_calendar.com" >> /etc/hosts
echo "127.0.0.1 test.social_calendar.com" >> /etc/hosts

#Setup Nginx (with ssl)
mkdir /etc/nginx/ssl/
cp etc/circleci2/ssl/server.crt /etc/nginx/ssl/server.crt
cp etc/circleci2/ssl/server.key /etc/nginx/ssl/server.key
cp etc/circleci2/social_calendar-test.conf /etc/nginx/sites-enabled/social_calendar-test.conf
sed -i.bak "s#TEST_DOMAIN_NAME#www.social_calendar.com#g" /etc/nginx/sites-enabled/social_calendar-test.conf
sed -i.bak "s#WEBROOT_PATH#/var/www/web/#g" /etc/nginx/sites-enabled/social_calendar-test.conf
rm /etc/nginx/sites-enabled/social_calendar-test.conf.bak


#Copy over needed files
cp etc/circleci2/parameters.yml app/config/parameters.yml
cp etc/circleci2/web/app_test.php web/app_test.php

#Modify current config to use CirclCI specific infrastructure
sed -i 's/selenium:4444/localhost:4444/' behat.yml


#Setup cache & logs folders with proper permissions
mkdir -p /dev/shm/social_calendar/cache /dev/shm/social_calendar/logs
setfacl -R -m u:www-data:rwx -m u:`whoami`:rwx  /dev/shm/social_calendar/cache /dev/shm/social_calendar/logs
setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx /dev/shm/social_calendar/cache /dev/shm/social_calendar/logs
chmod 777 -R /dev/shm/social_calendar/cache /dev/shm/social_calendar/logs

