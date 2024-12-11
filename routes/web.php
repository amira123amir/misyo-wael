<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Image;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('create', [Image::class,'create'])->name('image.create');
Route::post('/image', [Image::class,'store'])->name('image.store');