<?php

use App\Http\Controllers\Barang\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Satuan\SatuanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

// use App\Http\Controllers\Barang\BarangController;
// use App\Http\Controllers\EmployeeController;


Route::get('/', function () {
    return view('dashboard');
});
// login
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login-proses', [LoginController::class, 'login_proses'])->name('login-proses'); // gawe loginan


// Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
Route::get('logout', [LoginController::class, 'logout'])->name('logout'); // gawe logout
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', ProfileController::class)->name('profile');


    // gawe inisisasi barang karo satuan controller e
    Route::resource('barang', BarangController::class);
    Route::resource('satuan', SatuanController::class);
    // Route::put('/employees/{id}', 'EmployeeController@update')->name('employees.update');

// });
