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
use App\Http\Controllers\empbillcontroller;
use App\Http\Controllers\chemicalexpensescontroller;
use App\Http\Controllers\fertilizercontroller;
use App\Http\Controllers\reportcontroller;
use App\Http\Controllers\employeesreportcontroller;
use App\Http\Controllers\toolscontroller;
use App\Http\Controllers\tearecordreportcontroller;
use App\Http\Controllers\settingcontroller;
use App\Http\Controllers\activitycontroller;



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
Route::post('/admin/profile/change-password',[profilecontroller::class,'changepassword'])->middleware('sessioncheck');

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


Route::get('/admin/emp-bill',[empbillcontroller::class,'empbill'])->middleware('sessioncheck');



Route::get('/admin/chemical-expenses',[chemicalexpensescontroller::class,'chemicalexpenses'])->middleware('sessioncheck');
Route::post('/admin/chemical-expenses/insert',[chemicalexpensescontroller::class,'insertrecord'])->middleware('sessioncheck');
Route::get('/admin/chemical-expenses/delete/{id}',[chemicalexpensescontroller::class,'deleterecord'])->middleware('sessioncheck');


Route::get('/admin/fertilizer-expenses',[fertilizercontroller::class,'fertilizer'])->middleware('sessioncheck');
Route::post('/admin/fertilizer-expenses/insert',[fertilizercontroller::class,'insertrecord'])->middleware('sessioncheck');
Route::get('/admin/fertilizer-expenses/delete/{id}',[fertilizercontroller::class,'deleterecord'])->middleware('sessioncheck');

Route::get('/admin/tea-reports/tea-bill',[reportcontroller::class,'report'])->middleware('sessioncheck');
Route::get('/admin/tea-reports/employees',[employeesreportcontroller::class,'employeesreport'])->middleware('sessioncheck');
Route::get('/admin/tea-reports/tea-records',[tearecordreportcontroller::class,'teareportreport'])->middleware('sessioncheck');



Route::get('/admin/tools',[toolscontroller::class,'tools'])->middleware('sessioncheck');

Route::get('/admin/settings',[settingcontroller::class,'setting'])->middleware('sessioncheck');
Route::get('/admin/acivity-logs',[activitycontroller::class,'activity'])->middleware('sessioncheck');