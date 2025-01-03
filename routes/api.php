<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Customer\Auth\CustomerRegisterController;
use App\Http\Controllers\Api\Customer\Auth\CustomerLoginController;
use App\Http\Controllers\Api\Customer\CustomerController;
use App\Http\Controllers\Api\Customer\OrderController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::prefix('custmoer/')->group(function(){
Route::post('customer/register', [CustomerRegisterController::class,'store'])->name('customer.register');
Route::post('customer/login', [CustomerLoginController::class,'login'])->name('customer.login');
Route::post('customer/logout', [CustomerLoginController::class,'logout'])->name('customer.logout');

Route::get('/product', [CustomerController::class,'index'])->name('product');
Route::get('/search', [CustomerController::class,'search'])->name('product.search');

Route::middleware(['auth:sanctum','Customer'])->group(function(){

//});

}
);

Route::get('/product', [CustomerController::class,'index'])->name('product.index');

Route::post('/order', [OrderController::class,'store']);














