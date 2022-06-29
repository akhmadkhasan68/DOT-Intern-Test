<p align="center"><img src="https://raw.githubusercontent.com/akhmadkhasan68/DOT-Intern-Test/master/public/assets/media/logos/logo-1.png" width="400">
</p>

## About this Project

This project is created for intership test in DOT Indonesia as a Backend Engineer. This project is about students management data and majors management data. 

## Depedencies

- Laravel [framework](https://laravel.com/).
- Indoregion [library for region seeder & migration](https://github.com/azishapidin/indoregion).

## Installation
1. Clone this repository with `git` command below
```console
$ git clone https://github.com/akhmadkhasan68/DOT-Intern-Test.git
```
2. Copy file `.env.example` and rename this file to `.env`
3. Edit your database configuration in `.env` file
```console
DB_CONNECTION=mysql
DB_HOST=YOUR_HOST
DB_PORT=YOUR_PORT
DB_DATABASE=YOUR_DATABASE_NAME
DB_USERNAME=YOUR_DATABASE_USERNAME
DB_PASSWORD=YOUR_DATABASE_PASSWORD
```
4. Generate your application key using `php artisan` command below
```console
$ php artisan key:generate
```
5. Run database migration using `php artisan` commad below
```console
$ php artisan migrate
```
6. Run database seeder using `php artisan` commad below
```console
$ php artisan db:seed
```

##API Documentation

You can access this project API documentation [here](https://www.postman.com/)
