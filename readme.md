## Installation

* `cp .env.example .env` and configure
    * DB settings
    * Name in
        * APP_NAME
        * APP_URL
* composer install
* run initial migrations & seed: php artisan migrate --seed

## Usage
### Export
http://laravel-excel.localhost/export

## Errors
See comments in ExportController@export and Exports/ExportQueued
