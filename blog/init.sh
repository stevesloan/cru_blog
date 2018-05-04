#!/bin/bash
if [ ! -f ./.INSTALLED ]; then
    until mysql -h db -P 3306 -uroot -pexample; do
        sleep 1
        echo "MySql is unavailable - sleeping"
    done
    echo "MySql is available"
    mysql -h db -P 3306 -uroot -pexample -e "CREATE DATABASE IF NOT EXISTS crublog"
    php artisan make:model BlogPost -m && php artisan migrate
    mysql -h db -uroot -pexample crublog < test_db_2017-05-24.sql
    touch .INSTALLED
fi
