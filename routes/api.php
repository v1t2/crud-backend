<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\BukuController;
use App\http\Controllers\JurusanController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getbuku',[BukuController::class,'getbuku']);
Route::get('/getjurusan',[JurusanController::class,'getjurusan']);
Route::get('/getid/{id}',[BukuController::class,'getid']);
Route::get('/getid/{id}',[JurusanController::class,'getid']);
Route::post('/createbuku',[BukuController::class,'createbuku']);
Route::post('/createjurusan',[JurusanController::class,'createjurusan']);
Route::put('/updatebuku/{id}',[BukuController::class, 'updatebuku']);
Route::put('/updatejurusan/{id}',[JurusanController::class, 'updatejurusan']);
Route::delete('/deletebuku/{id}',[BukuController::class, 'deletebuku']);
Route::delete('/deletejurusan/{id}',[JurusanController::class, 'deletejurusan']);