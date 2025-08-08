<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::controller(App\Http\Controllers\LoginController::class)->group(function () {
    Route::get('login', 'login')->name('login')->middleware('guest');
    Route::post('authenticate', 'authenticate')->name('authenticate');
    Route::post('logout', 'logout')->name('logout')->middleware('auth');
});

Route::get('/redirect', [App\Http\Controllers\KemenkeuIDController::class, 'redirectToProvider'])->name('redirect');
Route::get('/connect', [App\Http\Controllers\KemenkeuIDController::class, 'handleProviderCallback'])->name('connect');
// Route::post('/logout', [App\Http\Controllers\KemenkeuIDController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil')->middleware('auth');

Route::resource('user', App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('role', App\Http\Controllers\RoleController::class)->middleware(['auth', 'role:admin']);
Route::resource('example', App\Http\Controllers\ExampleController::class)->middleware('auth');
Route::resource('preferensi', App\Http\Controllers\PreferensiController::class)->middleware('auth');
