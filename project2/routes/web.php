<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sinhvien','getinfocontroller@getInfostudent');
Route::get('dangky',function(){
	return view('addsv');
});
Route::post('addsv', 'postInfocontroller@addsv')->name('addsv');
Route::get('dltsv/{id}', 'deletesvcontroller@deletesv');
Route::get('edit/{id}', 'Updatesvcontroller@Getsvbyid');
Route::post('edit/{id}', 'Updatesvcontroller@Update')->name('edit');



