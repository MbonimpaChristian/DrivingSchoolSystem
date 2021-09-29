<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentPaymentController;

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
Route::get('/students', "StudentController@index");
Route::get('/students/{id}/delete',"StudentController@destroy");
Route::get('/students/{id}/edit',"StudentController@edit");
Route::put('/students/{id}',"StudentController@update");


Route::get('/teachers/', 'TeacherController@index')->name('teacher.index');
Route::get('/teachers/create', 'TeacherController@create')->name('teacher.create');
Route::post('/teachers/store', 'TeacherController@store')->name('teacher.store');
Route::put('/teachers/edit', 'TeacherController@edit')->name('teacher.edit');

Route::get('/teachers/mystudent', 'TeacherController@mystudent')->name('teacher.mystudent');
Route::get('/teachers/{id}/edit', "TeacherController@edit");

Route::get('/courses/', "CourseController@index")->name('course.index');
Route::get('/courses/create', "CourseController@create");
Route::post('/courses', "CourseController@store");
Route::get('/courses/{id}/addvideo', "CourseController@addVideo");
Route::post('/courses/video/store', "CourseController@storeVideo");

Route::get('/courses/{id}/edit', "CourseController@edit");
Route::get('/courses/{id}', "CourseController@show")->middleware('paid');
Route::PUT('/courses/{course}', "CourseController@update");

Route::get('/payment/{id}/approvepayment', 'PaymentController@create')->name('payment.create');
Route::put('/payment/store', 'PaymentController@store')->name('payment.store');

Route::get('/TestQuestion/create',"TestQuestionController@create");
Route::post('/TestQuestion/create',"TestQuestionController@saveNewQuestion");
Route::get('/TestQuestion/test',"TestQuestionController@test");
Route::get('/TestQuestion/result',"TestQuestionController@result")->name('testquestion.result');
Route::get('/testresults',"test_resultController@index");


Route::post('/courses/payWithFlutterWave',[StudentPaymentController::class,'payWithFlutterWave'])->name('payWithFlutterWave');
Route::get('/courses/payWithFlutterWave/callback', [StudentPaymentController::class, 'callback'])->name('callback');
// Route::get('/courses/{course}/delete', "CourseController@destroy");
// ->middleware('paid');
