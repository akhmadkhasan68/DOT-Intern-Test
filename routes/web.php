<?php

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
    return view('layouts.master');
});

Route::resource("students", StudentsController::class);
Route::resource("majors", MajorsController::class);

Route::get('/login', function(){
    return view('login');
});
