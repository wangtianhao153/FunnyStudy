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

Route::get('teacher/index','CourseController@courselistdisplay');
Route::get('teacher/info/{id}','CourseController@courseinfodisplay');
Route::get('teacher/createcourse','CourseController@createCourse');
Route::get('teacher/createchapter','CourseController@createChapter');
Route::get('teacher/uploadvideo/{id}','CourseController@uploaddisplay');
Route::post('teacher/listdelete/{id}','CourseController@listdelete');
Route::post('teacher/createfirst','CourseController@createfirst');
