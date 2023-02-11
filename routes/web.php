<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CompanyController;

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

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::get('/', function () {

    return view('auth/login');
});


Route::middleware(['auth', 'verified'])->group(function () {

    Route::middleware(['can:isAdmin'])->group(function () {


        Route::get('/users', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::post('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/user/show/{user}', [UserController::class, 'show'])->name('user.show');


        Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
        Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
        Route::get('/employee/edit/{employee}', [EmployeeController::class, 'edit'])->name('employee.edit');
        Route::post('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
        Route::post('/employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
        Route::post('/employee/create', [EmployeeController::class, 'store'])->name('employee.store');
        Route::get('/employee/show/{employee}', [EmployeeController::class, 'show'])->name('employee.show');


        Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
        Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
        Route::get('/company/edit/{company}', [CompanyController::class, 'edit'])->name('company.edit');
        Route::post('/company/update/{id}', [CompanyController::class, 'update'])->name('company.update');
        Route::post('/company/delete/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
        Route::post('/company/create', [CompanyController::class, 'store'])->name('company.store');
        Route::get('/company/show/{company}', [CompanyController::class, 'show'])->name('company.show');
    });


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('/transactions', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('/transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
    Route::get('/transaction/edit/{id}', [TransactionController::class, 'edit'])->name('transaction.edit');
    Route::post('/transaction/update/{id}', [TransactionController::class, 'update'])->name('transaction.update');
    Route::post('/transaction/delete/{id}', [TransactionController::class, 'destroy'])->name('transaction.destroy');
    Route::post('/transaction/create', [TransactionController::class, 'store'])->name('transaction.store');


    Route::get('/invoice/generate/{id}', [InvoiceController::class, 'generate'])->name('invoice.generate');
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::get('/invoice/edit/{invoice}', [InvoiceController::class, 'edit'])->name('invoice.edit');
    Route::post('/invoice/update/{id}', [InvoiceController::class, 'update'])->name('invoice.update');
    Route::post('/invoice/delete/{id}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
    Route::post('/invoice/create', [InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('/invoice/show/{invoice}', [InvoiceController::class, 'show'])->name('invoice.show');


    Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::get('/customer/edit/{customer}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::post('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    Route::post('/customer/create', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer/show/{customer}', [CustomerController::class, 'show'])->name('customer.show');


    Route::get('/vehicle/create', [VehicleController::class, 'create'])->name('vehicle.create');
    Route::get('/vehicle/edit/{vehicle}', [VehicleController::class, 'edit'])->name('vehicle.edit');
    Route::post('/vehicle/update/{id}', [VehicleController::class, 'update'])->name('vehicle.update');
    Route::post('/vehicle/delete/{id}', [VehicleController::class, 'destroy'])->name('vehicle.destroy');
    Route::post('/vehicle/create', [VehicleController::class, 'store'])->name('vehicle.store');
    Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicle.index');
    Route::get('/vehicle/show/{vehicle}', [VehicleController::class, 'show'])->name('vehicle.show');
});
