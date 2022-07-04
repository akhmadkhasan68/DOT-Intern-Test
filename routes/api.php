<?php

use App\Http\Controllers\Api\MajorsController;
use App\Http\Controllers\Web\MajorsController as MajorsWebController;
use App\Http\Controllers\Api\StudentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("majors/datatable", [MajorsWebController::class, "datatable"])->name("majors.datatable");
Route::apiResource("majors", MajorsController::class)->except("create", "edit");
Route::apiResource("students", StudentsController::class)->except("create", "edit");
