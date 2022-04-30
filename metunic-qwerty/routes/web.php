<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;



use App\Http\Controllers\User\UserController;


use \App\Http\Controllers\Admin\AdminController;
use \App\Http\Controllers\Admin\LanguageController;
use \App\Http\Controllers\Admin\MenuController;
use \App\Http\Controllers\Admin\PanelUserController;
use \App\Http\Controllers\Admin\SliderController;


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



Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => '\App\Http\Controllers\LanguageController@switchLang']);


Route::prefix('user')->name('user.')->group(function (){

    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){

       Route::view('/login','front.user.login')->name('login');
       Route::view('/register','front.user.register')->name('register');
       Route::post('/save',[UserController::class, 'save'])->name('save');
       Route::post('/check',[UserController::class, 'check'])->name('check');

    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){

        Route::view('/home','front.home')->name('home');
        Route::post('/logout',[UserController::class, 'logout'])->name('logout');

    });

    Route::get('/index',[UserController::class,'index'])->name('index');
});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function (){
        Route::view('/login','admin.admin.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');

    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function (){
        Route::view('/home','admin.index')->name('home');
        Route::post('/logout',[AdminController::class, 'logout'])->name('logout');


        Route::get('/language',[LanguageController::class, 'index'])->name('language');
        Route::get('/language/create', [LanguageController::class, 'create'])->name('language.create');
        Route::post('/language/store', [LanguageController::class, 'store'])->name('language.store');
        Route::get('/language/edit/{id}', [LanguageController::class, 'edit'])->name('language.edit');
        Route::put('/language/update/{id}', [LanguageController::class, 'update'])->name('language.update');
        Route::delete('/language/destroy/{id}', [LanguageController::class, 'destroy'])->name('language.destroy');
        Route::post('/language/sortable', [LanguageController::class, 'sortable'])->name('language.sortable');

        Route::get('/menu',[MenuController::class, 'index'])->name('menu');
        Route::get('/menu/create',[MenuController::class, 'create'])->name('menu.create');
        Route::post('/menu/store',[MenuController::class, 'store'])->name('menu.store');
        Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
        Route::put('/menu/update/{menu}', [MenuController::class, 'update'])->name('menu.update');


        Route::get('/panel_user',[PanelUserController::class, 'index'])->name('panel.user');
        Route::get('/panel_user/create',[PanelUserController::class, 'create'])->name('panel.user.create');
        Route::post('/panel_user/store',[PanelUserController::class, 'store'])->name('panel.user.store');

        Route::get('/panel_user/edit/{admin}',[PanelUserController::class, 'edit'])->name('panel.user.edit');
        Route::put('/panel_user/update/{admin}', [PanelUserController::class, 'update'])->name('panel.user.update');
        Route::delete('/panel_user/destroy/{id}', [PanelUserController::class, 'destroy'])->name('panel.user.destroy');





        Route::get('/category',[CategoryController::class, 'index'])->name('category');




        Route::get('/slider',[SliderController::class, 'index'])->name('slider');
        Route::post('/slider/sortable', [SliderController::class, 'sortable'])->name('slider.sortable');
        Route::get('/slider/create',[SliderController::class, 'create'])->name('slider.create');
        Route::post('/slider/store',[SliderController::class, 'store'])->name('slider.store');
        Route::get('/slider/edit/{id}',[SliderController::class, 'edit'])->name('slider.edit');
        Route::put('/slider/update/{id}',[SliderController::class, 'update'])->name('slider.update');



    });

});
