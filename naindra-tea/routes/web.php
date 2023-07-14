<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\employeescontroller;
use App\Http\Controllers\teacontroller;
use App\Http\Controllers\profilecontroller;
use App\Http\Controllers\teabillcontroller;
use App\Http\Controllers\teasuppliercontroller;
use App\Http\Controllers\wagecontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
})->middleware('checkcurrentsession');
Route::get('login',[logincontroller::class,'login']);
Route::get('/logout',[logincontroller::class,'logout']);

Route::post('/insertdata',[usercontroller::class,'insertdata']);

Route::get('admin/dashboard',[dashboardcontroller::class,'dashboard'])->middleware('sessioncheck');

Route::get('admin/employees',[employeescontroller::class,'employees'])->middleware('sessioncheck');
Route::post('admin/employees/insertrecord',[employeescontroller::class,'insertrecord'])->middleware('sessioncheck');
Route::get('/admin/employees/{id}', [employeescontroller::class, 'getemployeesById'])->middleware('sessioncheck');
Route::post('admin/employees/updaterecord',[employeescontroller::class,'updaterecords'])->middleware('sessioncheck');


Route::get('admin/tea-records',[teacontroller::class,'tea_records'])->middleware('sessioncheck');
Route::post('admin/tea-records/insert',[teacontroller::class,'insertrecord'])->middleware('sessioncheck');
Route::get('/admin/tea-records/edit/{id}', [teacontroller::class, 'gettearecordById'])->middleware('sessioncheck');
Route::get('/admin/tea-records/delete/{id}', [teacontroller::class, 'deleterecord'])->middleware('sessioncheck');
Route::post('admin/tea-records/update',[teacontroller::class,'updaterecords'])->middleware('sessioncheck');

Route::get('/admin/profile',[profilecontroller::class,'profile'])->middleware('sessioncheck');

Route::get('/admin/tea-bills',[teabillcontroller::class,'teabill'])->middleware('sessioncheck');
Route::post('/admin/tea-bills/insert',[teabillcontroller::class,'insertrecord'])->middleware('sessioncheck');
Route::get('/admin/tea-bills/view',[teabillcontroller::class,'viewteabills'])->middleware('sessioncheck');
Route::get('/admin/tea-bills/ajax',[teabillcontroller::class,'fetchteabilldata'])->middleware('sessioncheck');
Route::get('/admin/tea-bills/delete/{id}',[teabillcontroller::class,'deletebillrecord'])->middleware('sessioncheck');


Route::post('/admin/wage/insert',[wagecontroller::class,'insertrecord'])->middleware('sessioncheck');
Route::post('/admin/wage/update/{id}',[wagecontroller::class,'editrecord'])->middleware('sessioncheck');

Route::get('/admin/tea-suppliers',[teasuppliercontroller::class,'teasuppliers'])->middleware('sessioncheck');
Route::get('/get-tea-data/{optionId}', [teasuppliercontroller::class,'getTeaData'])->middleware('sessioncheck');
Route::post('/admin/tea-suppliers/insert',[teasuppliercontroller::class,'insertrecord'])->middleware('sessioncheck');
Route::get('/admin/tea-suppliers/delete/{id}',[teasuppliercontroller::class,'deleterecord'])->middleware('sessioncheck');