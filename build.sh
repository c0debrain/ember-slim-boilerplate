#!/bin/sh

cd ember-app
ember build
cd ..
cp ./ember-app/dist/index.html ./slim-app/app/templates/app.php
cp -r ./ember-app/dist/assets/ ./slim-app/public/assets/
cp -r ./ember-app/dist/images/ ./slim-app/public/images/
cp -r ./ember-app/dist/scripts/ ./slim-app/public/scripts/
cp -r ./ember-app/dist/style/ ./slim-app/public/style/ 
