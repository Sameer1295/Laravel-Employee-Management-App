<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\PayrollController;
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
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('layouts.home');
});


Route::get('employee/export/', [App\Http\Controllers\EmployeeController::class, 'export'])->name('employee_export');
Route::resource('employee', EmployeeController::class)->middleware('auth');
Route::get('payroll/export/', [App\Http\Controllers\PayrollController::class, 'export'])->name('payroll_export');
Route::resource('payroll', PayrollController::class)->middleware('auth');
Route::get('employer/export/', [App\Http\Controllers\EmployerController::class, 'export'])->name('employer_export');
Route::resource('employer', EmployerController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/employees', [EmployeeController::class, 'emps']);
Route::get('/pays', [PayrollController::class, 'emp']);
