<?php

use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use \App\Models\Type;
use \App\Models\Hashtag;
use \App\Models\Image;
use \App\Models\LinkImageHashs;

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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* Route::resources([
    'images' => ImageController::class,
    'hashtags' => HashtagController::class,
    'links' => LinkImageHashsController::class
]); */