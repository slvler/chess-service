<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::get('/admin', [AdminController::class, 'index']);

Route::get('/menuAdmin', [MenuController::class, 'index'])->name('menuAdmin');
Route::get('/menuAdminCreate', [MenuController::class, 'create'])->name('menuAdminCreate');
Route::post('/menuAdminStore', [MenuController::class, 'store'])->name('menuAdminStore');
Route::get('/menuAdminEdit/{id}', [MenuController::class, 'edit'])->name('menuAdminEdit');
Route::put('/menuAdminUpdate/{id}', [MenuController::class, 'update'])->name('menuAdminUpdate');


