<?php

use Illuminate\Support\Facades\Route;


Route::get('/',[\App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::post('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/company',[\App\Http\Controllers\CompaniesController::class, 'index'])
    ->name('company');
Route::get('/company/{id}', [\App\Http\Controllers\CompaniesController::class, 'show'])
    ->name('company_show');
Route::post('/company/{id}', [\App\Http\Controllers\CompaniesController::class, 'show'])
    ->name('company_show');
Route::get('/user/{id}', [\App\Http\Controllers\UserController::class, 'getUpdateUser'])
    ->middleware('auth')->name('update_user');
Route::post('/user/{id}', [\App\Http\Controllers\UserController::class, 'postUpdateUser'])
    ->middleware('auth')->name('update_file');
Route::delete('/user/{id}', [\App\Http\Controllers\UserController::class, 'deleteAvatar'])
    ->middleware('auth')->name('avatar_delete');



Route::group(['middleware' => 'guest'], function () {
    Route::get('/vk/auth', [\App\Http\Controllers\SocialController::class, 'vkRedirect'])->name('vk.auth');
    Route::get('/vk/auth/callback', [\App\Http\Controllers\SocialController::class, 'vkCallback']);
    Route::get('/google/auth', [\App\Http\Controllers\SocialController::class, 'googleRedirect'])->name('google.auth');
    Route::get('/google/auth/callback', [\App\Http\Controllers\SocialController::class, 'googleCallback']);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->middleware('auth')->name('home');
