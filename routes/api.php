<?php

use App\Http\Controllers\HashtagController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LinkImageHashsController;
use App\Http\Controllers\ViewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/portfolio', [ViewController::class, 'index'])->name('portfolio');

Route::get('/admin/images', [ImageController::class, 'index']);

Route::group(['prefix' => 'admin/images'],function(){
    /* ADD IMAGE */
    Route::post('/store', [ImageController::class, "store"])->name('images.store'); // Ajout d'image
    /* UPDATE IMAGE */
    Route::post('/{id}/edit', [ImageController::class, 'update'])->name('images.update'); // Envoi du formulaire
    /* DELETE IMAGE */
    Route::post('/{id}/delete', [ImageController::class, 'destroy'])->name('images.destroy');
});

Route::group(['prefix' => 'admin/hashs'],function(){
    /* ADD HASH */
    Route::post('/store', [HashtagController::class, 'store'])->name('hashs.store');
    /* DELETE HASH */
    Route::post('/{id}/delete', [HashtagController::class, 'destroy'])->name('hashs.destroy');
});

Route::group(['prefix' => 'admin/links'],function(){
    /* ADD LINK */
    Route::post('/store', [LinkImageHashsController::class, 'store'])->name('links.store');
    /* DELETE LINK */
    Route::post('/{id}/delete', [LinkImageHashsController::class, 'destroy'])->name('links.destroy');
});
