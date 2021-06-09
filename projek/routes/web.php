<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PlanController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/registrasi', [AuthController::class, 'registrasi']);
Route::post('/registrasi/create', [AuthController::class, 'postregistrasi']);

Route::group(['middleware' => ['auth','checkRole:admin']], function(){
    Route::post('/matkul/create', [MatkulController::class, 'create']);
    Route::get('/matkul/{id}/edit', [MatkulController::class, 'edit']);
    Route::post('/matkul/{id}/update', [MatkulController::class, 'update']);
    Route::get('/matkul/{id}/delete', [MatkulController::class, 'delete']);
    
});

Route::group(['middleware' => ['auth','checkRole:admin,mahasiswa']], function(){
    Route::get('/matkul', [MatkulController::class, 'index']);
    Route::get('/matkul/{id}/view', [MatkulController::class, 'view']);

    Route::get('/forum', [ForumController::class, 'index']);
    Route::post('/forum/create', [ForumController::class, 'create']);
    Route::get('/forum/{forum}/view', [ForumController::class, 'view']);
    Route::post('/forum/{forum}/view', [ForumController::class, 'postkomentar']);
    Route::get('/forum/{id}/delete', [ForumController::class, 'delete']);
    Route::get('/komentar/{id}/delete', [ForumController::class, 'delete_komentar']);
    Route::get('/komentar/{id}/delete2', [ForumController::class, 'delete_komentar2']);

    Route::get('/profilsaya', [ProfilController::class, 'index']);
    Route::post('/profilsaya', [ProfilController::class, 'update']);

    Route::get('/plansaya', [PlanController::class, 'index']);
    Route::get('/matkul/{id}/simpan', [PlanController::class, 'simpan']);
    
});
