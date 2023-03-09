<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

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

Route::post("add", [DeviceController::class, 'addDevice']);
Route::put("update", [DeviceController::class, 'update']);
Route::get("list/{id?}", [DeviceController::class, 'list']);
Route::delete("delete/{id}", [DeviceController::class, 'deleteDevice']);
Route::get("search/{name}", [DeviceController::class, 'search']);
Route::post('test-validation', [DeviceController::class, 'testValidations']);

Route::apiResource("category", CategoryController::class);

Route::post('login', [UserController::class, 'index']);
