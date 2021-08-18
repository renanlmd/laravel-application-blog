# About the project
***

My goal with this project will be to have a prototype for the blogging and news creation business, and it will also serve for didactic purposes and learning in the development of applications in Laravel.

## Pre-requisites
 - PHP >= 8.0
 - Composer
 - NPM >= 7.20 

# Instalation
***

Choice your directory and clone the project
```shell
git clone https://github.com/renanlmd/laravel-application-blog.git
```

Run the dependencies php
```shell
$ composer install
$ cp .env.example .env
$ php artisan key:generate
```

After installing the dependencies, you should install and build your NPM dependencies and migrate your database:
```shell
$ npm install
$ npm run dev
$ php artisan migrate --seed
```

Run the server 
```shell
$ php artisan serve 
```
Access in the browser: http://localhost:8000 

### Ambience alternative of development 
You can use Laravel Sail to interact with the Docker development environment. Sail provides a great starting point for building a Laravel app, without the need for previous Docker experience

##### Pre-requisites
- Docker

Building all docker containers defined in your docker-compose.yml
```shell
./vendor/bin/sail build --no-cache
```

Run to start all Docker containers
```shell
./vendor/bin/sail up -d
```

For more details on Laravel Sail, see the 
[documentation](https://laravel.com/docs/8.x/sail)

***

<p align="center">Developed by: <a href="https://github.com/renanlmd">Renan Almeida</a></p> 