#!/bin/sh

# gitignore regex
# /(.*\/)?(\.idea|dist|tmp|node_modules|bower_components|.sass-cache|connect.lock|libpeerconnection.log|npm-debug.log|testem.log|coverage|vendor|composer.lock)/

#REGEX="^(.*\/)?(\.idea|dist|tmp|node_modules|bower_components|.sass-cache|connect.lock|libpeerconnection.log|npm-debug.log|testem.log|coverage|vendor|composer.lock)$";

#fswatch -o $PWD/ember-slim/ -e ${REGEX} | xargs -n1 $PWD/ember-build.sh