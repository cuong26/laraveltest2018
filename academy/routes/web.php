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


Route::any('/', function () {
    return view('welcome');
})->where(['/' => '.*']);
Route::get('/{any}', function () { 
    return view('welcome');
})->where(['any' => '(?!admin).*']);
Route::get('/khoahoc/{any}', function () { 
    return view('welcome'); 
});



// Route::get('lienhe', function () {
//      return view('contact'); 
// })->name('lienhe');
// Route::get('about', function () {
//      return view('about'); 
// })->name('about');
// Route::get('team', function () {
//      return view('team'); 
// })->name('team');
// Route::get('khoahoc', function () {
//      return view('couseslist'); 
// })->name('khoahoc');
// Route::get('tintuc', function () {
//      return view('blog'); 
// })->name('tintuc');
// Route::get('tinchitiet', function () {
//      return view('blogsingle'); 
// })->name('tinchitiet');
// Route::get('khoahocct', function () {
//      return view('courrseslist'); 
// });

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'Backend\DashboardController@index');
    Route::group(['prefix' => 'ajax'], function () {
    	Route::post('check-mail', 'Backend\AjaxController@checkMail');
    	Route::post('check-alias', 'Backend\AjaxController@checkAlias');
        Route::get('check-comment','Backend\AjaxController@checkComment');
        Route::get('load-section','Backend\AjaxController@loadSection');
    	Route::get('load-lesson','Backend\AjaxController@loadLesson');
    });
    Route::resource('newsletter', 'Backend\NewsletterController');
     Route::post('menu/serialize', 'Backend\MenuController@serialize');
    Route::resource('menu','Backend\MenuController');
    Route::resource('partner', 'Backend\PartnerController');
    Route::post('news-category/serialize', 'Backend\NewsCategoryController@serialize');
    Route::resource('news-category', 'Backend\NewsCategoryController');
    Route::resource('news', 'Backend\NewsController');
    Route::post('course-category/serialize', 'Backend\CourseCategoryController@serialize');
    Route::resource('course-category', 'Backend\CourseCategoryController');
    Route::resource('course', 'Backend\CourseController');
    Route::resource('course-comment', 'Backend\CourseCommentController');
    Route::resource('teacher', 'Backend\TeacherController');
    Route::resource('contact','Backend\ContactController');
    Route::resource('news-comment','Backend\NewsCommentController');
    Route::resource('student','Backend\StudentController');
    Route::get('setting','Backend\SettingController@getSetting');
    Route::post('setting','Backend\SettingController@postSetting');
    Route::resource('user','Backend\UserController');
    Route::resource('banner','Backend\BannerController');
    Route::resource('testimonial','Backend\TestimonialController');
});

Route::get('admin/login', 'Backend\AuthController@getLogin');
Route::post('admin/login', 'Backend\AuthController@postLogin');
Route::get('admin/logout', 'Backend\AuthController@logout');