<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeductionTypeController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\EmailConfigController;
use App\Http\Controllers\Admin\InvoiceConfigController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
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

// Auth::routes();
Route::get('/', function () {
  // return view('welcome');
  return view('public/login');
});

// PUBLIC FOLDER
Route::get('login', [MainController::class, 'login']);

// PRIVATE FOLDER ADMIN
Route::get('admin/dashboard', [DashboardController::class, 'index']);
Route::get('admin/profile', [ProfileController::class, 'index']);
Route::get('admin/current', [ProfileController::class, 'current_show']);
Route::get('admin/inactive', [ProfileController::class, 'inactive']);
Route::get('admin/activeProfile/{id}/{profile_id}', [ProfileController::class, 'activeProfile']);
Route::get('admin/inactiveProfile/{id}/{profile_id}', [ProfileController::class, 'inactiveProfile']);
Route::get('admin/editInvoice/{id}', [InvoiceController::class, 'edit_invoice']);

Route::get('invoice/addInvoice', [InvoiceController::class, 'add_invoice']);
Route::get('invoice/current', [InvoiceController::class, 'current']);
Route::get('invoice/inactive', [InvoiceController::class, 'inactive']);

Route::get('settings/deductiontype', [DeductionTypeController::class, 'view_deductiontype']);

Route::get('reports/invoice', [InvoiceController::class, 'reports_invoice']);
Route::get('reports/deduction', [InvoiceController::class, 'reports_deduction']);

Route::get('settings/emailconfig', [EmailConfigController::class, 'email_config']);
Route::get('settings/invoiceconfig', [InvoiceConfigController::class, 'invoice_config']);

// PRIVATE FOLDER USER
Route::get('user/dashboard', [DashboardController::class, 'userindex']);
