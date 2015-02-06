#!/bin/sh

cd ember-app
npm install
bower install
cd ..
cd slim-app
php composer.phar install
cd ..
sh build.sh