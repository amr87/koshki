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

Route::middleware('locale:api')->post('customer/register', 'API\\CustomerController@register');
Route::middleware('locale:api')->post('customer/login', 'API\\CustomerController@auth');
Route::middleware('locale:api')->post('customer/facebook', 'API\\CustomerController@facebook');

Route::middleware('auth:api')->get('/customer', function (Request $request) {
    return $request->user();
});
