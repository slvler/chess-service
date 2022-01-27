<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;

use \App\Http\Controllers\CategoryController;

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

Route::get('/menuadmin', [MenuController::class, 'index'])->name('menuadmin');
Route::get('/menuadmincreate', [MenuController::class, 'create'])->name('menuadmincreate');
Route::post('/menuadminstore', [MenuController::class, 'store'])->name('menuadminstore');
Route::get('/menuadminedit/{id}', [MenuController::class, 'edit'])->name('menuadminedit');
Route::put('/menuadminupdate/{id}', [MenuController::class, 'update'])->name('menuadminupdate');
Route::delete('/menuadmindestroy/{id}', [MenuController::class, 'destroy'])->name('menuadmindestroy');


Route::get('/submenuadmin/{id}', [SubmenuController::class, 'index'])->name('submenuadmin');
Route::get('/submenuadmincreate/{id}', [SubmenuController::class, 'create'])->name('submenuadmincreate');
Route::post('/submenuadminstore/{id}', [SubmenuController::class, 'store'])->name('submenuadminstore');
Route::get('/submenuadminedit/{id}', [SubmenuController::class, 'edit'])->name('submenuadminedit');
Route::put('/submenuadminupdate/{id}', [SubmenuController::class, 'update'])->name('submenuadminupdate');
Route::delete('/submenuadmindestroy/{id}', [SubmenuController::class, 'destroy'])->name('submenuadmindestroy');

Route::get('/categoryadmin', [CategoryController::class, 'index'])->name('categoryadmin');
