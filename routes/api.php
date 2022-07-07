<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\HashtagController;
use App\Http\Controllers\LinkImageHashsController;

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

Route::middleware('auth:auth')->get('/user', function (Request $request) { return $request->user(); });

Route::get('/portfolio', [ViewController::class, 'index'])->name('portfolio');

/* ADMIN */
Route::group(['prefix' => 'admin/images'],function(){
    /* ADD IMAGE */
    Route::post('/store', [ImageController::class, "store"])->name('images.store'); // Ajout d'image
    /* INDEX IMAGE */
    Route::get('/', [ImageController::class, 'index']);
    /* UPDATE IMAGE */
    Route::post('/{id}/edit', [ImageController::class, 'update'])->name('images.update'); // Envoi du formulaire
    /* DELETE IMAGE */
    Route::post('/{id}/delete', [ImageController::class, 'destroy'])->name('images.destroy');
});

Route::group(['prefix' => 'admin/hashs'],function(){
    /* ADD HASH */
    Route::post('/store', [HashtagController::class, 'store'])->name('hashs.store');
    /* INDEX IMAGE */
    Route::get('/', [HashtagController::class, 'index']);
    /* DELETE HASH */
    Route::post('/{id}/delete', [HashtagController::class, 'destroy'])->name('hashs.destroy');
});

Route::group(['prefix' => 'admin/links'],function(){
    /* ADD LINK */
    Route::post('/store', [LinkImageHashsController::class, 'store'])->name('links.store');
    /* INDEX IMAGE */
    Route::get('/', [LinkImageHashsController::class, 'index']);
    /* DELETE LINK */
    Route::post('/{id}/delete', [LinkImageHashsController::class, 'destroy'])->name('links.destroy');
});