<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/our-works', [HomeController::class, 'ourWorks'])->name('our-works');

Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'is_admin'], 'namespace' => '\App\Http\Controllers\Admin'], function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('images', ImageController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('catalogs', CatalogController::class);
    Route::resource('contact', ContactController::class);
});


