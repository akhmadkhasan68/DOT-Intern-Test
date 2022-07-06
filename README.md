<p align="center"><img src="https://raw.githubusercontent.com/akhmadkhasan68/DOT-Intern-Test/master/public/assets/media/logos/logo-1.png" width="400"></p>

## About this Project

This project is created for intership test in DOT Indonesia as a Backend Engineer. This project is about students management data and majors management data. 

## Screenshot
<p align="center">
    Login
    <img src="https://raw.githubusercontent.com/akhmadkhasan68/DOT-Intern-Test/master/public/assets/media/demosd/demo25.png" width="400">
</p>
<p align="center">
    Register
    <img src="https://raw.githubusercontent.com/akhmadkhasan68/DOT-Intern-Test/master/public/assets/media/demosd/demo26.png" width="400">
</p>
<p align="center">
    Data Siswa
    <img src="https://raw.githubusercontent.com/akhmadkhasan68/DOT-Intern-Test/master/public/assets/media/demosd/demo27.png" width="400">
</p>
<p align="center">
    Data Jurusan
    <img src="https://raw.githubusercontent.com/akhmadkhasan68/DOT-Intern-Test/master/public/assets/media/demosd/demo28.png" width="400">
</p>
<p align="center">
    Database Design
    <img src="https://raw.githubusercontent.com/akhmadkhasan68/DOT-Intern-Test/master/public/assets/media/demosd/demo29.png" width="400">
</p>

## Depedencies

- [Laravel Framework](https://laravel.com/).
- [Indoregion](https://github.com/azishapidin/indoregion).
- [Yajra DataTables](https://yajrabox.com/docs/laravel-datatables/master).
- [Axios](https://axios-http.com).
- [DataTables](https://datatables.net/).
- [JQuery](https://jquery.com/).
- [Sweetalert](https://sweetalert2.github.io/).
- [Toastr](https://github.com/CodeSeven/toastr).

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
7. Run `npm` command below to install all javascript depedencies
```console
$ npm install
```

## How to Run
1. Run local serve using `php artisan` command below
```console
$ php artisan serve
```
2. Run `npm` command to compil javascript mixing assets
```console
$ npm run dev
```

## API Documentation

You can access this project API documentation [here](https://documenter.getpostman.com/view/9987865/UzJFvJQL)
