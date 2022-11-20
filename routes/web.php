<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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
    return view('login');
})->name('login');

Route::post('/users/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::group(['middleware' => ['auth', 'role:admin|consultant']], function(){

	Route::get('/admin', function () {
		$companies_qty = count(DB::select('select * from company'));
		$employees_qty = count(DB::select('select * from employee'));
    return view('admin.index', ['companies_qty' => $companies_qty, 'employees_qty' => $employees_qty]);
	})->name('admin.index');

	Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

	Route::resource('/admin/companies', CompanyController::class );
	Route::resource('/admin/employees', EmployeeController::class );

});