<?php

use App\Models\Image;
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

Route::get('/portfolio', function() {
    return Image::all();
});

Route::get('/portfolio/dessin', function() {
    $type = Type::where('types.label', 'dessin');
    return Image::all()->where('images.id_type', $type->id);
});

Route::get('/portfolio/photo', function() {
    $type = Type::where('types.label', 'photo');
    return Image::all()->where('images.id_type', $type->id);
});