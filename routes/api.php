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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'product', 'as' => 'product'], function () {
    Route::get('/', 'ProductController@allProducts');
    Route::get('/{id}', 'ProductController@getSingle')->where(['id' => '[0-9]+'])->name('.single');
    Route::post('/update/{product}', 'ProductController@update')->where(['product' => '[0-9]+'])->name('.update');
});

Route::group(['prefix' => 'product-log', 'as' => 'product.log'], function () {
    Route::get('/{id}', 'ProductLogController@getSingle')->where(['id' => '[0-9]+'])->name('.single');
});


