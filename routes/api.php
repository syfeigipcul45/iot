<?php

use App\Http\Controllers\API\SensorsController;
use App\Models\sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/sensor', [SensorsController::class, 'index'])->name('index');
Route::post('/sensor/post', [SensorsController::class, 'sensor'])->name('sensor');
Route::get('/getSensors', [SensorsController::class, 'getSensors'])->name('data-sensor');
Route::get('/getAllSensors', [SensorsController::class, 'getAllSensors'])->name('data-semua-sensor');

