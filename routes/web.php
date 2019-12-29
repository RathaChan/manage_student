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

Route::get('/master', function () {
    return view('dashboard.master');
});

Route::get('/show', function () {
    return view('content.show');
});
Route::get('/students/attendance', 'AttendanceController@index');
Route::get('/students/attendance/create', 'AttendanceController@index1');
Route::get('/attendance/create', 'AttendanceController@create');
Route::post('attendance/store', 'AttendanceController@store');
Route::get('/attendance/list_add', 'AttendanceController@getData');
Route::get('/attendance/{attend}/edit', 'AttendanceController@editAttend');
Route::put('/attendance/{attend}', 'AttendanceController@update');
Route::get('/attendance/{attend}', 'AttendanceController@destroy');

//Route::post('/students/attendance/create', 'AttendanceController@create');


//Route::resource('attendances', 'AttendanceController');
Route::resource('students', 'StudentController');
Route::get('/students/{student}/edit', 'StudentController@edit');
Route::get('/students/{student}', 'StudentController@destroy');
Route::get('/students/search', 'StudentController@scopeSearch');


/* Subject*/
Route::get('/subjects', 'SubjectController@index');
Route::post('/subjects', 'SubjectController@store');
Route::get('/subjects/create', 'SubjectController@create');
Route::get('/subjects/{id}/edit', 'SubjectController@edit');
Route::put('/subjects/{subject}', 'SubjectController@update');
Route::get('/subjects/{subject}', 'SubjectController@destroy');

/* Time Study*/
Route::get('/time_study', 'TimeStudyController@index');
Route::post('/time_study', 'TimeStudyController@store');
Route::get('/time_study/create', 'TimeStudyController@create');
Route::get('/time_study/{time_study}/edit', 'TimeStudyController@edit');
Route::put('/time_study/{timeStudy}', 'TimeStudyController@update');
Route::get('/time_study/{timeStudy}', 'TimeStudyController@destroy');

Route::get('/ui', function () {
    return view('timestudy.ui_time_study');
});
//login

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Score

Route::resource('scores', 'ScoreController');
Route::get('/scores/{score}', 'ScoreController@destroy');

