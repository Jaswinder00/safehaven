#!/bin/bash

if [ "$1" = "prod" ]; then
  php app/console cache:clear --env=prod
elif [ "$1" = "test" ]; then
  php app/console cache:clear --env=test
else
  php app/console cache:clear
fi

rm -rf app/cache/*
rm -rf app/logs/*
chown -R apache:apache app/cache
chmod -R 755 app/cache
chown -R apache:apache app/logs
chmod -R 755 app/logs

if [ "$1" = "prod" ]; then
  php app/console assetic:dump --env=prod --no-debug
elif [ "$1" = "test" ]; then
  php app/console assetic:dump --env=test --no-debug
else
  php app/console assetic:dump
fi


chown -R www-data:www-data app/cache
chmod -R 755 app/cache
chown -R www-data:www-data app/logs

if [ "$1" = "prod" ] || [ "$2" = "-o" ]; then
 echo "Running composer to optimize the code"
 composer dump-autoload --optimize
fi
