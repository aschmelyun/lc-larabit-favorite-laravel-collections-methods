<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/collection/1', [CollectionController::class, 'one']);
Route::get('/collection/2', [CollectionController::class, 'two']);
Route::get('/collection/3', [CollectionController::class, 'three']);
Route::get('/collection/4', [CollectionController::class, 'four']);
Route::get('/collection/5', [CollectionController::class, 'five']);