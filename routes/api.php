<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\MajorsController;
use App\Http\Controllers\Api\StudentsController;
use App\Http\Controllers\Api\ProvinceController;
use App\Http\Controllers\Api\RegencyController;
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

Route::group(["prefix" => "auth"], function(){
    Route::post("/login", [AuthController::class, "login"]);
    Route::post("/register", [AuthController::class, "register"]);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(["middleware" => "auth:sanctum"], function(){
    Route::apiResource("majors", MajorsController::class)->except("create", "edit");
    Route::apiResource("students", StudentsController::class)->except("create", "edit");
});

Route::get("provinces", [ProvinceController::class, "index"]);
Route::get("regencies", [RegencyController::class, "index"]);
Route::get("regencies/{province_id}", [RegencyController::class, "getByProvince"]);
Route::get("districts", [DistrictController::class, "index"]);
Route::get("districts/{regency_id}", [DistrictController::class, "getByRegency"]);
