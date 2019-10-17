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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/admin',function (){
    return view('admin');
});

Route::get('/admin_addhr', 'AdminController@addHr')->name('hr_addemployee');
Route::post('/admin_addhr', 'AdminController@store')->name('admin_addhr');
Route::get('/admin_viewhr', 'AdminController@viewHr')->name('admin_viewhr');
Route::get('/admin_viewhr/{edithr}/edit','AdminController@editHr');
Route::delete('/admin_viewhr/{deletehr}/delete','AdminController@deleteHr');
Route::put('/admin_viewhr/{edithr}','AdminController@updateHr');
Route::get('/admin_viewhr/{edithr}','AdminController@viewHr');
Route::get('/hr',function (){
    return view('hr');
});
Route::get('/hr_addemployee', 'HrController@addEmployee')->name('hr_addemployee');
Route::post('/hr_addemployee', 'HrController@store')->name('hr_addemployee');
Route::get('/hr_viewemployee','HrController@viewEmp')->name('hr_viewemployee');
Route::get('/hr_viewemployee/{editemployee}/edit','HrController@editEmployee');
Route::delete('/hr_viewemployee/{deleteemployee}/delete','HrController@deleteEmployee');
Route::put('/hr_viewemployee/{editemployee}','HrController@updateEmployee');
Route::get('/hr_viewemployee/{editemployee}','HrController@viewEmployee');
Route::get('/hr_viewattend', 'HrController@viewAttend')->name('hr_viewattend');
Route::get('/hr_viewreport', 'HrController@viewReport')->name('hr_viewreport');

Route::get('/employee',function (){
    return view('employee');
});
Route::get('/employee_viewattend', 'EmployeeController@viewAttend')->name('employee_viewattend');


Route::get('/employee_markattend','EventsController@markAttend')->name('events.markattend');
Route::post('/employee_markattend/timein', 'EventsController@markTimein')->name('timein');
