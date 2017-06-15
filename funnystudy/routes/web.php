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
Route::get('teacher/index','CoursemanagerController@index');
Route::get('teacher/list','CoursemanagerController@courselistdisplay');
Route::get('teacher/info/{id}','CoursemanagerController@courseinfodisplay');
Route::get('teacher/createcourse','CoursemanagerController@createCourse');
Route::get('teacher/createchapter','CoursemanagerController@createChapter');
Route::get('teacher/uploadvideo/{id}','CoursemanagerController@uploaddisplay');
Route::get('teacher/pswd','CoursemanagerController@password');
Route::post('teacher/listdelete/{id}','CoursemanagerController@listdelete');
Route::post('teacher/createfirst','CoursemanagerController@createfirst');
Route::any('teacher/createsecond','CoursemanagerController@createsecond');
Route::post('teacher/createthird','CoursemanagerController@createthird');
Route::post('teacher/editthumb','CoursemanagerController@editthumb');
Route::post('teacher/editCourseInfo','CoursemanagerController@editCourseInfo');
Route::post('teacher/videoDelete/{id}','CoursemanagerController@videoDelete');
Route::post('teacher/chapterDelete/{id}','CoursemanagerController@chapterDelete');
Route::post('teacher/reorder','CoursemanagerController@reorder');
Route::post('teacher/editHead','CoursemanagerController@editUserHead');
Route::post('teacher/editUser','CoursemanagerController@editUserInfo');
Route::post('teacher/editPassword','CoursemanagerController@editPassword');
/*课程列表*/
Route::get('course/list','CourseController@index');
Route::get('course/play/{id}','CourseController@courseplay');
Route::get("videoPlay/{id}",'CourseController@videoPlay');
Route::get('course/list/subserch/{id}','CourseController@subjectserch');
Route::get('course/list/graserch/{id}','CourseController@gradesearch');
Route::get('course/{id}','CourseController@coursedetails');
/*登录*/
Route::get('login','LoginController@index');
Route::post('/submit','LoginController@validation');
Route::get('exits','LoginController@exits');
//注册
Route::get('register','RegisterController@index');
Route::post('/sbt','RegisterController@register');
//个人中心
Route::get('student','StudentController@index');
Route::get('collection','CollectionController@index');
Route::get('reply','ReplyController@index');
Route::get('introduction','IntroductionController@index');
Route::any('updata','IntroductionController@updata');
/*教师列表*/
Route::get('teacherdisplay/listdisplay','TeacherDisplayController@listDisplay');
Route::get('teacherdisplay/information/{id}','TeacherDisplayController@information');
Route::post('teacherdisplay/teacherLogin','TeacherDisplayController@teacherLogin');
Route::post('teacherdisplay/studentsteachers','TeacherDisplayController@studentsteachers');
Route::post('teacherdisplay/teachersstudents','TeacherDisplayController@teachersstudents');
//首页
Route::get('/index','IndexController@index');
//资讯页
Route::get('/news/index','NewsController@index');
Route::get('/news/newscontent/{id}','NewsController@newscontent');

