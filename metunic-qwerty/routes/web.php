<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\User\UserController;


use \App\Http\Controllers\Admin\AdminController;
use \App\Http\Controllers\Admin\LanguageController;


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
    });

});
