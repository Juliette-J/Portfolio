<?php

use App\Http\Controllers\HashtagController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LinkImageHashsController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/* ADMIN */
Auth::routes();
Route::get('/home/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home.admin');

/* LANG */
Route::get('locale', [LocalizationController::class, 'getLang'])->name('lang.get');
Route::get('locale/{lang}', [LocalizationController::class, 'setLang'])->name('lang.set');

Route::get('/portfolio', function () {
    return view('portfolio');
});

Route::group(['prefix' => 'admin/images'],function(){
    /* ADD IMAGE */
    Route::get('/create', [ImageController::class, 'create'])->name('images.create'); // Formulaire d'ajout d'image
    /* INDEX IMAGE */
    Route::get('/', function() { return view('index_images'); })->name('images.list'); // Listing des images
    /* UPDATE IMAGE */
    Route::get('/{id}/edit', [ImageController::class, 'edit'])->name('images.edit'); // Formulaire de modification d'image
});

Route::group(['prefix' => 'admin/hashs'],function(){
    /* ADD HASH */
    Route::get('/create',[HashtagController::class, 'create'])->name('hashs.create');
    /* INDEX HASH */
    Route::get('/', function() { return view('index_hashs'); })->name('hashs.list'); // Listing des hashtags
});

Route::group(['prefix' => 'admin/links'],function(){
    /* ADD LINK */
    Route::get('/create',[LinkImageHashsController::class, 'create'])->name('links.create');
    /* INDEX LINK */
    Route::get('/', [LinkImageHashsController::class, 'index'])->name('links.list'); // Listing des links
  });

/* Vue publique */
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
