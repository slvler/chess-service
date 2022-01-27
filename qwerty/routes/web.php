<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;

use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\SubcategoryController;


use \App\Http\Controllers\SliderController;

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
Route::get('/categoryadmincreate', [CategoryController::class, 'create'])->name('categoryadmincreate');
Route::post('/categoryadminstore', [CategoryController::class, 'store'])->name('categoryadminstore');
Route::get('/categoryadminedit/{id}', [CategoryController::class, 'edit'])->name('categoryadminedit');
Route::put('/categoryadminupdate/{id}', [CategoryController::class, 'update'])->name('categoryadminupdate');
Route::delete('/categoryadmindestroy/{id}', [CategoryController::class, 'destroy'])->name('categoryadmindestroy');


Route::get('/subcategoryadmin/{id}', [SubcategoryController::class, 'index'])->name('subcategoryadmin');
Route::get('/subcategoryadmincreate/{id}', [SubcategoryController::class, 'create'])->name('subcategoryadmincreate');
Route::post('/subcategoryadminstore/{id}', [SubcategoryController::class, 'store'])->name('subcategoryadminstore');
Route::get('/subcategoryadminedit/{id}', [SubcategoryController::class, 'edit'])->name('subcategoryadminedit');
Route::put('/subcategoryadminupdate/{id}', [SubcategoryController::class, 'update'])->name('subcategoryadminupdate');
Route::delete('/subcategoryadmindestroy/{id}', [SubcategoryController::class, 'destroy'])->name('subcategoryadmindestroy');



Route::get('/slideradmin', [SliderController::class, 'index'])->name('slideradmin');
Route::get('/slideradmincreate', [SliderController::class, 'create'])->name('slideradmincreate');
Route::post('/slideradminstore', [SliderController::class, 'store'])->name('slideradminstore');
Route::get('/slideradminedit/{id}', [SliderController::class, 'edit'])->name('slideradminedit');
Route::put('/slideradminupdate/{id}', [SliderController::class, 'update'])->name('slideradminupdate');
Route::get('/slideradmingallery/{id}', [SliderController::class, 'gallery'])->name('slideradmingallery');
Route::put('/slideradminimage/{id}', [SliderController::class, 'image'])->name('slideradminimage');
Route::delete('/slideradmindestroy/{id}', [SliderController::class, 'destroy'])->name('slideradmindestroy');


Route::get('/settingadmin', [SliderController::class, 'index'])->name('settingadmin');
