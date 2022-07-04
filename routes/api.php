<?php

use App\Http\Controllers\ViewController;
use App\Models\Image;
use App\Models\LinkImageHashs;
use App\Models\Type;
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
