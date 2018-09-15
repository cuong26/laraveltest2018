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

Route::group(['prefix' => 'news'], function() {
	Route::get('list', 'Api\NewsController@getList');
	Route::get('lastest', 'Api\NewsController@getLastest');
	Route::get('detail', 'Api\NewsController@getDetail');
    Route::get('list-filter','Api\NewsController@getListFilter');
});

Route::group(['prefix' => 'news-category'], function() {
	Route::get('list', 'Api\NewsCategoryController@getList');
});

Route::group(['prefix' => 'teacher'], function() {
	Route::get('list', 'Api\TeacherController@getList');
});

Route::group(['prefix' => 'course'], function() {
	Route::get('feature-course', 'Api\CourseController@getFeatureCourse');
	Route::get('list', 'Api\CourseController@getListCourse');
	Route::get('detail', 'Api\CourseController@getDetail');
	Route::get('banner','Api\CourseController@getBanner');
	Route::get('link-course', 'Api\CourseController@getLinkCourse');
	Route::get('lastest-course','Api\CourseController@getLastestCourse');
    Route::get('list-filter','Api\CourseController@getListFilterCourse');
});

Route::group(['prefix' => 'course-category'], function() {
	Route::get('list', 'Api\CourseCategoryController@getList');
});

Route::group(['prefix' => 'setting'], function() {
	Route::get('list', 'Api\SettingController@getList');
});

Route::group(['prefix' => 'course-comment'], function() {
    Route::get('list', 'Api\CourseCommentController@getList');
    Route::post('checkcomment', 'Api\CourseCommentController@checkComment');
});

Route::group(['prefix' => 'menu'], function() {
	Route::get('list', 'Api\MenuController@getList');
});
Route::group(['prefix' => 'contact'], function(){
	Route::post('add','Api\ContactController@postAdd');
});

Route::group(['prefix' => 'partner'], function() {
	Route::get('list', 'Api\PartnerController@getList');
});

Route::group(['prefix' => 'newsletter'], function() {
	Route::post('add', 'Api\NewsletterController@add');
});

Route::group(['prefix' => 'news-comment'], function() {
    Route::get('list', 'Api\NewsCommentController@getList');
    Route::post('checkcomment', 'Api\NewsCommentController@checkComment');
});

Route::group(['prefix'  => 'banner'], function(){
    Route::get('list', 'Api\BannerController@getList');
});

Route::group(['prefix'  => 'student'], function(){
    Route::post('create', 'Api\StudentController@create');
});

Route::group(['prefix'  => 'testimonial'], function(){
    Route::get('list', 'Api\TestimonialController@getList');
});

