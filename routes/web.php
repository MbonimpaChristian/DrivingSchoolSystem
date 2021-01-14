<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/', function(){
    return Redirect::to('login');
 });

Route::get('/home', 'HomeController@redirection')->name('redirection');
Route::get('/pdf/daily', 'HomeController@getDailyReport')->name('dailyReport');
Route::get('/pdf/weekly', 'HomeController@getWeeklyReport')->name('weeklyReport');
Route::get('/pdf/monthly', 'HomeController@getMonthlyReport')->name('monthlyReport');
Route::post('/pdf/range', 'HomeController@getRangeReport')->name('rangeReport');
Route::get('students/list', 'HomeController@getNotSubbedStudents')->name('students.list');

Route::get('/users/', 'UserController@index')->name('user.index');
Route::get('/users/{id}', 'UserController@show')->name('user.show');

Route::get('/students/show{id}', "StudentController@show");

Route::get('/teachers/', 'TeacherController@index')->name('teacher.index');
Route::get('/teachers/create', 'TeacherController@create')->name('teacher.create');
Route::post('/teachers/store', 'TeacherController@store')->name('teacher.store');
Route::get('/teachers/mystudent', 'TeacherController@mystudent')->name('teacher.mystudent');

Route::get('/courses/', "CourseController@index")->name('course.index');
Route::get('/courses/create', "CourseController@create");
Route::post('/courses', "CourseController@store");
Route::get('/courses/{id}/addvideo', "CourseController@addVideo");
Route::post('/courses/video/store', "CourseController@storeVideo");

Route::get('/courses/{id}/edit', "CourseController@edit");
Route::get('/courses/{id}', "CourseController@show");
Route::PUT('/courses/{course}', "CourseController@update");

Route::get('/payment/{id}/approvepayment', 'PaymentController@create')->name('payment.create');
Route::post('/payment/store', 'PaymentController@store')->name('payment.store');
// Route::get('/courses/{course}/delete', "CourseController@destroy");
