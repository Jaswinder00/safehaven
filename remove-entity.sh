#!/bin/bash

echo "Please enter the Entity Name you wish to remove."
read entity

if [ -z $entity ]; then
	echo "No Entity name entered. Please try again"
	exit
fi
rm src/DCGov/HavenBundle/Form/${entity}Type.php
lc_entity="${entity,,}"
rm src/DCGov/HavenBundle/Resources/config/routing/$lc_entity.yml
rm src/DCGov/HavenBundle/Resources/config/routing/$lc_entity.php
rm -rf src/DCGov/HavenBundle/Resources/views/$entity

rm src/DCGov/HavenBundle/Controller/${entity}Controller.php
rm src/DCGov/HavenBundle/Entity/$entity.php
