<?php

use App\Http\Controllers\HashtagController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LinkImageHashsController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ViewController;
use App\Models\LinkImageHashs;
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

Auth::routes();

Route::get('/portfolio/{type?}',[ViewController::class, "portfolio"]);

Route::get('/home/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home.admin');

Route::group(['prefix' => 'admin/images'],function(){
    /* ADD IMAGE */
    Route::get('/create', [ImageController::class, 'create'])->name('images.create'); // Formulaire d'ajout d'image
    Route::post('/', [ImageController::class, "store"])->name('images.store'); // Ajout d'image

    /* UPDATE IMAGE */
    Route::get('/', [ImageController::class, 'index'])->name('images.list'); // Listing des images
    Route::get('/{id}/edit', [ImageController::class, 'edit'])->name('images.edit'); // Formulaire de modification d'image
    Route::post('/{id}/edit', [ImageController::class, 'update'])->name('images.update'); // Envoi du formulaire

    /* DELETE IMAGE */
    Route::post('/{id}/delete', [ImageController::class, 'destroy'])->name('images.destroy');
});

Route::group(['prefix' => 'admin/hashs'],function(){
    /* ADD HASH */
    Route::get('/create',[HashtagController::class, 'create'])->name('hashs.create');
    Route::post('/', [HashtagController::class, 'store'])->name('hashs.store');

    /* DELETE HASH */
    Route::get('/', [HashtagController::class, 'index'])->name('hashs.list'); // Listing des hashtags
    Route::post('/{id}/delete', [HashtagController::class, 'destroy'])->name('hashs.destroy');
});

Route::group(['prefix' => 'admin/links'],function(){
    /* ADD LINK */
    Route::post('/', [LinkImageHashsController::class, 'store'])->name('links.store');
    Route::get('/create',[LinkImageHashsController::class, 'create'])->name('links.create');

    /* DELETE LINK */
    Route::get('/', [LinkImageHashsController::class, 'index'])->name('links.list'); // Listing des links
    Route::post('/{id}/delete', [LinkImageHashsController::class, 'destroy'])->name('links.destroy');
});

/**
 * Vue publique
 */
Route::get('/', function () {
    return view('welcome');
});