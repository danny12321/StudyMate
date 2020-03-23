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

Route::get('/', 'DashboardController@index')->name('dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/admin/teachers', 'Admin\TeacherController@index')->name('admin_teacher');
Route::get('/admin/teacher/new', 'Admin\TeacherController@new')->name('admin_teacher__new');
Route::post('/admin/teacher/create', 'Admin\TeacherController@create')->name('admin_teacher__create');
Route::get('/admin/teacher/<id>/edit', 'Admin\TeacherController@edit')->name('admin_teacher__edit');

Route::get('/admin/courses', 'Admin\CoursesController@index')->name('admin_course');
Route::get('/admin/course/new', 'Admin\CoursesController@new')->name('admin_course_new');
Route::post('/admin/course/create', 'Admin\CoursesController@create')->name('admin_course_create');
Route::get('/admin/course/<id>/edit', 'Admin\CoursesController@edit')->name('admin_course_edit');


Route::get('/deadline', 'DeadlineController@index')->name('deadline');