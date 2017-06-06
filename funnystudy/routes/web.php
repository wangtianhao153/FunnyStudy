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
/*课程管理*/
Route::get('teacher/index','CoursemanagerController@courselistdisplay');
Route::get('teacher/info/{id}','CoursemanagerController@courseinfodisplay');
Route::get('teacher/createcourse','CoursemanagerController@createCourse');
Route::get('teacher/createchapter','CoursemanagerController@createChapter');
Route::get('teacher/uploadvideo/{id}','CoursemanagerController@uploaddisplay');
Route::post('teacher/listdelete/{id}','CoursemanagerController@listdelete');
Route::post('teacher/createfirst','CoursemanagerController@createfirst');
Route::any('teacher/createsecond','CoursemanagerController@createsecond');
Route::post('teacher/createthird','CoursemanagerController@createthird');
Route::post('teacher/editthumb','CoursemanagerController@editthumb');
Route::post('teacher/editCourseInfo','CoursemanagerController@editCourseInfo');
/*课程列表*/
Route::get('course/list','CourseController@index');
Route::get("course/play/{id}",'CourseController@courseplay');
/*登录*/
Route::get('login','LoginController@index');
Route::post('/submit','LoginController@validation');