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

/*Route::get('/add_employee', function () {
    return view('employee/add_employee');
});*/

Route::get('/add_leave', function () {
    return view('leave/add_leave');
});

/*Route::get('/employee', function () {
    return view('employee/view_employees');
});*/

Route::get('/view_leaves', function () {
    return view('leave/view_leaves');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::group(['middleware' => 'web'], function () {
    Route::Resource('employee','EmployeeController');
});
