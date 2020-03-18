<?php

use Illuminate\Http\Request;

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

/** No authenticantion guards as of this moment. Free for all! */
Route::resource('comments', 'Api\CommentController')->only([
    'index', 'store'
]);;
