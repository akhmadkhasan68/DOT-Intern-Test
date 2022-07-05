<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\MajorsController;
use App\Http\Controllers\Web\StudentsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route("students.index"));
});

Route::group(["middleware" => "auth"], function(){
    Route::get("students/datatable", [StudentsController::class, "datatable"])->name("students.datatable");
    Route::get("majors/datatable", [MajorsController::class, "datatable"])->name("majors.datatable");

    Route::resource("students", StudentsController::class);
    Route::resource("majors", MajorsController::class);

    Route::post('/logout', [AuthController::class, "logout"])->name("logout");
});

Route::group(["prefix" => "auth", "middleware" => "guest"], function(){
    Route::get('/login', [AuthController::class, "login"])->name("login");
    Route::get('/register', [AuthController::class, "register"])->name("register");
    Route::post('/login', [AuthController::class, "attemptLogin"])->name("login.attempt");
    Route::post('/register', [AuthController::class, "attemptRegister"])->name("register.attempt");
});
