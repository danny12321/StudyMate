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
Route::get('/admin/teacher/new', 'Admin\TeacherController@new')->name('admin_teacher_new');
Route::post('/admin/teacher/create', 'Admin\TeacherController@create')->name('admin_teacher_create');
Route::get('/admin/teacher/{teacher}/edit', 'Admin\TeacherController@edit')->name('admin_teacher_edit');
Route::put('/admin/teacher/{teacher}', 'Admin\TeacherController@update')->name('admin_teacher_update');
Route::delete('/admin/teacher/{teacher}', 'Admin\TeacherController@destroy')->name('admin_teacher_delete');

Route::get('/admin/courses', 'Admin\CoursesController@index')->name('admin_course');
Route::get('/admin/course/new', 'Admin\CoursesController@new')->name('admin_course_new');
Route::post('/admin/course/create', 'Admin\CoursesController@create')->name('admin_course_create');
Route::get('/admin/course/{course}/edit', 'Admin\CoursesController@edit')->name('admin_course_edit');
Route::put('/admin/course/{course}', 'Admin\CoursesController@update')->name('admin_course_update');
Route::delete('/admin/course/{course}', 'Admin\CoursesController@destroy')->name('admin_course_delete');


Route::get('/deadline', 'DeadlineController@index')->name('deadline');