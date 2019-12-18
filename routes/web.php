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
Route::post('attendance', 'AttendanceController@store');
//Route::post('/students/attendance/create', 'AttendanceController@create');


Route::resource('students', 'StudentController');
//Route::resource('attendances', 'AttendanceController');


