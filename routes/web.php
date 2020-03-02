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
use RealRashid\SweetAlert\Facades\Alert;

Route::get('/', function () {


    return view('welcome');
});

Auth::routes();
Route::resource('students','StudentController');
Route::resource('student','StudentsController');
Route::resource('staff','StaffController');
Route::resource('staffs','StaffsController');
Route::resource('faculties','FacultyController');
Route::resource('departments','DepartmentController');
Route::resource('requests','RequestController');
Route::resource('payment','PaymentController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
