<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeductionTypeController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\EmailConfigController;
use App\Http\Controllers\Admin\InvoiceConfigController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
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

Route::middleware(['isPrivateCheck'])->group(function () {
    // PRIVATE FOLDER ADMIN
    Route::get('admin/dashboard', [DashboardController::class, 'index']);
    Route::get('admin/profile', [ProfileController::class, 'index']);
    Route::get('admin/current', [ProfileController::class, 'current_show']);
    Route::get('admin/inactive', [ProfileController::class, 'inactive']);
    Route::get('admin/activeProfile/{id}/{profile_id}', [ProfileController::class, 'activeProfile']);
    Route::get('admin/inactiveProfile/{id}/{profile_id}', [ProfileController::class, 'inactiveProfile']);
    Route::get('admin/editInvoice/{id}', [InvoiceController::class, 'edit_invoice']);
    Route::get('admin/editInactiveInvoice/{id}', [InvoiceController::class, 'edit_inactiveInvoice']);
    // PRIVATE FOLDER INVOICE
    Route::get('invoice/addInvoice', [InvoiceController::class, 'add_invoice']);
    Route::get('invoice/editInvoice/{id}', [InvoiceController::class, 'edit_Invoiceinvoice']);
    Route::get('invoice/editInactiveInvoice/{id}', [InvoiceController::class, 'edit_inactiveInvoiceinvoice']);
    Route::get('invoice/current', [InvoiceController::class, 'current']);
    Route::get('invoice/inactive', [InvoiceController::class, 'inactive']);
    // PRIVATE FOLDER DEDUCTION TYPE
    Route::get('settings/deductiontype', [DeductionTypeController::class, 'view_deductiontype']);
    // PRIVATE FOLDER REPORTS
    Route::get('reports/invoice', [InvoiceController::class, 'reports_invoice']);
    Route::get('reports/deduction', [InvoiceController::class, 'reports_deduction']);
    // PRIVATE FOLDER SETTINGS
    Route::get('settings/emailconfig', [EmailConfigController::class, 'email_config']);
    Route::get('settings/invoiceconfig', [InvoiceConfigController::class, 'invoice_config']);

    // PRIVATE FOLDER USER
    Route::get('user/dashboard', [DashboardController::class, 'userindex']);
    Route::get('user/soa', [DashboardController::class, 'usersoa']);
    Route::get('user/profile', [ProfileController::class, 'userprofile']);
    Route::get('user/activeProfile/{id}/{profile_id}', [ProfileController::class, 'userviewProfile']);
    Route::get('user/inactive', [ProfileController::class, 'userinactive']);
    Route::get('user/profileEditInvoice/{id}', [InvoiceController::class, 'profileEditInvoice']);
    Route::get('user/activeEditInvoice/{id}', [InvoiceController::class, 'activeEditInvoice']);
    Route::get('user/inactiveEditInvoice/{id}', [InvoiceController::class, 'inactiveEditInvoice']);
    Route::get('user/addInvoice', [InvoiceController::class, 'user_addInvoice']);
    Route::get('user/currentActiveInvoice', [InvoiceController::class, 'user_currentActiveInvoice']);
    Route::get('user/currentInactiveInvoice', [InvoiceController::class, 'user_currentInactiveInvoice']);
    Route::get('/user/userdeductiontype', [DeductionTypeController::class, 'view_userdeductiontype']);

    // FOR USER REPORTS
    Route::get('/userReports/invoice', [InvoiceController::class, 'userReports_invoice']);
    Route::get('/userReports/deduction', [InvoiceController::class, 'userReports_deduction']);
});

Route::middleware(['isPublicCheck'])->group(function () {

    // PUBLIC FOLDER
    Route::get('/', function () {
        // return view('welcome');
        return view('public/login');
    });
    // MAIN LOGIN
    Route::get('login', [MainController::class, 'login']);

    // EMAIL LOGIN
    Route::get('emailLogin', [MainController::class, 'emailLogin'])->name('emailLogin');
    // RESET PASSWORD
    Route::get('forgotPassword', [MainController::class, 'forgotPassword']);
    Route::get('password/reset/{token}', [MainController::class, 'showResetForm']);

    // INVOICE VIEW FROM EMAIL
    Route::get('admin/invoiceInfo/{token}', [InvoiceController::class, 'invoice_info']);
    Route::get('admin/invoiceInfoProfile/{token}', [InvoiceController::class, 'invoice_infoProfile']);
});
