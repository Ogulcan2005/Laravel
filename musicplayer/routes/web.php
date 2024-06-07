<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [Welcome::class, 'hello']);
Route::get('/songs', [SongController::class, 'index']);
Route::get("/genre/create", [GenreController::class, "create"]);
Route::post("/genre/store", [GenreController::class, "store"]);
