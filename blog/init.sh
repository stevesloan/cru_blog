#!/bin/bash
if [ ! -f ./.INSTALLED ]; then
    sleep 20
    mysql -h db -P 3306 -uroot -pexample -e "CREATE DATABASE IF NOT EXISTS crublog"
    php artisan make:model BlogPost -m && php artisan migrate
    touch .INSTALLED
fi
