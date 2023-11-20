<?php

use App\Http\Controllers\ReservierungsController;
use App\Http\Controllers\UmweltController;
use Illuminate\Support\Facades\Route;

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
// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('reservierung', ReservierungsController::class);
Route::resource('umwelt', UmweltController::class);
Route::get('/', function() {
   // dd(view('home'));
    return view("home");
});
