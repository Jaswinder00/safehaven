#!/bin/bash
echo "Please enter the Entity Name you wish to generate"
read entity

if [ -z $entity ]; then
echo "No Entity name entered. Please try again"
exit
fi

php app/console doctrine:generate:entities DCGovHavenBundle:$entity --path src
php app/console generate:doctrine:crud --entity=DCGovHavenBundle:$entity --overwrite
chown -R jaswinder:apache src/DCGov/HavenBundle/

chown apache:apache /app/logs/dev.log
