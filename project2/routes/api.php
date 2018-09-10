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
Route::get('/user/{id}','apisvcontroller@getsv' );
Route::get('/all', 'apisvcontroller@alluser');
Route::delete('delete/{id}','apisvcontroller@deletesv');
Route::put('update/{id}', 'apisvcontroller@update');
Route::post('addsv', 'apisvcontroller@store');

