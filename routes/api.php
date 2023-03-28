<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DeductionTypeController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\EmailConfigController;
use App\Http\Controllers\Admin\InvoiceConfigController;
use App\Http\Controllers\Admin\ProfileDeductionTypesController;
use App\Models\EmailConfig;
use App\Models\InvoiceConfig;
use App\Models\User;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Support\Carbon;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('resetPassword', [AuthController::class, 'resetPassword']);
Route::post('password/reset', [AuthController::class, 'reset']);

Route::middleware(['auth:api'])->group(function () {

  Route::resource('admin/dashboard', DashboardController::class);
  Route::post('createinvoice', [InvoiceController::class, 'create_invoice']);
  Route::post('createinvoice2', [InvoiceController::class, 'create_invoice2']);
  Route::post('add_invoices', [InvoiceController::class, 'add_invoices']);

  // FOR PROFILE TABLE
  Route::resource('admin/profile', ProfileController::class);
  Route::post('saveprofile', [ProfileController::class, 'store']);
  Route::get('show_profile', [ProfileController::class, 'show_profile']);

  // SHOW DEDUCTION TYPE IN PROFILE
  Route::get('show_deduction_type', [ProfileController::class, 'show_deduction_types']);
  Route::get('show_ProfileDeductionType', [ProfileController::class, 'show_ProfileDeductionType']);

  // Route::post('admin/UpdateProfile', [ProfileController::class, 'store'])->name('profile.update');
  Route::get('admin/show_data_active', [ProfileController::class, 'show_data_active']);
  Route::get('admin/show_data_inactive', [ProfileController::class, 'show_data_inactive']);
  Route::get('admin/activeProfile/{id}', [ProfileController::class, 'store']);
  Route::get('admin/inactiveProfile/{id}', [ProfileController::class, 'store']);
  Route::get('admin/show_edit/{id}', [ProfileController::class, 'show_edit']);

  // POST DEDUCTION TYPES TABLE
  Route::post('savedeductiontype', [DeductionTypeController::class, 'store']);
  Route::get('settings/show_data', [DeductionTypeController::class, 'show_data']);
  // Route::get('settings/show_deduction_data', [DeductionTypeController::class, 'show_deduction_data']);
  Route::get('settings/show_edit/{id}', [DeductionTypeController::class, 'show_edit']);

  // POST EMAIL TYPE TABLE
  Route::post('saveemailtype', [EmailConfigController::class, 'store']);
  Route::get('settings/show_emaildata', [EmailConfigController::class, 'show_data']);
  Route::get('settings/show_emailedit/{id}', [EmailConfigController::class, 'show_edit']);

  //  GET INVOICES FUNCTIONS
  Route::post('update_status_activeOrinactive', [InvoiceController::class, 'update_status_activeOrinactive']);
  Route::post('update_status', [InvoiceController::class, 'update_status']);
  Route::post('delete_invoice/{id}', [InvoiceController::class, 'destroy']);
  Route::get('admin/current_invoice', [InvoiceController::class, 'current_invoice']);
  Route::get('admin/inactive_invoice', [InvoiceController::class, 'inactive_invoice']);
  Route::get('invoice/check_profile/{id}', [InvoiceController::class, 'check_profile']);
  Route::get('invoice/generate_invoice_number', [InvoiceController::class, 'generate_invoice']);
  Route::get('admin/show_invoice', [InvoiceController::class, 'show_invoice']); // SHOW ACTIVE INVOICES
  Route::get('admin/show_statusInactiveinvoice', [InvoiceController::class, 'show_statusInactiveinvoice']); // SHOW INACTIVE INVOICES
  Route::get('admin/search_statusActive_invoice', [InvoiceController::class, 'search_statusActive_invoice']);
  Route::get('admin/search_statusInactive_invoice', [InvoiceController::class, 'search_statusInactive_invoice']);
  Route::get('admin/editInvoice/{id}', [InvoiceController::class, 'editInvoice']); // EDIT INVOICE VIEW
  Route::get('admin/editInactiveInvoice/{id}', [InvoiceController::class, 'editInvoice']); // EDIT INVOICE VIEW
  Route::get('invoiceConfig', [InvoiceController::class, 'invoiceConfig']); // INVOICE CONFIGS DATA
  Route::get('getInvoiceStatus/{id}', [InvoiceController::class, 'getInvoiceStatus']);
  Route::get('admin/show_Profilededuction_Table_Active', [InvoiceController::class, 'show_Profilededuction_Table_Active']);
  Route::get('active_paid_invoice_count', [InvoiceController::class, 'active_paid_invoice_count']);
  Route::get('active_pending_invoice_count', [InvoiceController::class, 'active_pending_invoice_count']);
  Route::get('active_overdue_invoice_count', [InvoiceController::class, 'active_overdue_invoice_count']);
  Route::get('active_cancelled_invoice_count', [InvoiceController::class, 'active_cancelled_invoice_count']);
  Route::get('inactive_paid_invoice_count', [InvoiceController::class, 'inactive_paid_invoice_count']);
  Route::get('inactive_pending_invoice_count', [InvoiceController::class, 'inactive_pending_invoice_count']);

  Route::get('admin/check_InactiveStatusInvoice', [InvoiceController::class, 'check_InactiveStatusInvoice']); // FOR INVOICE STATUS INACTIVE CHECK AND UPDATE
  Route::get('admin/check_pendingInvoicesStatus', [InvoiceController::class, 'check_pendingInvoicesStatus']); // FOR INVOICE STATUS ACTIVE CHECK AND UPDATE

  Route::get('admin/check_ActivependingInvoices', [InvoiceController::class, 'check_ActivependingInvoices']); // FOR ACTIVE PROFILE STATUS
  Route::get('admin/check_InactivependingInvoices', [InvoiceController::class, 'check_InactivependingInvoices']); // FOR INACTIVE PROFILE STATUS
  Route::get('admin/check_InactivependingInvoicesStatus', [InvoiceController::class, 'check_InactivependingInvoicesStatus']); // FOR INACTIVE PROFILE INVOICE STATUS
  Route::get('admin/check_ActivependingInvoicesStatus', [InvoiceController::class, 'check_ActivependingInvoicesStatus']); // FOR ACTIVE INVOICE STATUS
  Route::get('admin/show_overdueInvoices', [InvoiceController::class, 'show_overdueInvoices']);
  Route::get('admin/show_pendingInvoices', [InvoiceController::class, 'show_pendingInvoices']);
  Route::get('get_quickInvoice_PDT/{id}', [InvoiceController::class, 'get_quickInvoice_PDT']);

  Route::get('statusInactive_paid_invoice_count', [InvoiceController::class, 'statusInactive_paid_invoice_count']);
  Route::get('statusInactive_pending_invoice_count', [InvoiceController::class, 'statusInactive_pending_invoice_count']);

  // FOR EMAIL CONFIG TABLE
  Route::get('get_name', [EmailConfigController::class, 'get_name']);
  Route::get('emailconfigs/show_data', [EmailConfigController::class, 'show_data']);
  Route::get('emailconfigs/show_edit/{id}', [EmailConfigController::class, 'show_edit']);
  Route::post('emailconfigs_store', [EmailConfigController::class, 'emailconfig_store']);
  Route::post('email_configDelete/{id}', [EmailConfigController::class, 'destroy']);

  // POST PROFILE DEDUCTION TYPES TABLE
  Route::post('saveProfileDeductionTypes', [ProfileDeductionTypesController::class, 'store']);
  Route::post('editProfileDeductionTypes', [ProfileDeductionTypesController::class, 'store']);
  Route::get('showProfileDeductionTypes/{id}', [ProfileDeductionTypesController::class, 'show']);
  Route::get('settings/show_profileDeductionType_Button/{profile_id}', [ProfileDeductionTypesController::class, 'show_profileDeductionType_Button']);
  Route::get('settings/show_deduction_data/{profile_id}', [ProfileDeductionTypesController::class, 'show_deduction_data']);
  Route::get('settings/get_deduction/{id}', [ProfileDeductionTypesController::class, 'get_deduction']);
  Route::post('deleteProfileDeductionTypes/{id}', [ProfileDeductionTypesController::class, 'destroy']);

  // POST FOR DEDUCTION TYPE
  Route::post('deleteDeductionType/{id}', [DeductionTypeController::class, 'destroy']);

  // FOR INVOICE CONFIG TABLE
  Route::post('saveInvoiceConfig', [InvoiceConfigController::class, 'store']);
  Route::get('show_invoiceConfig_data', [InvoiceConfigController::class, 'show_invoiceConfig_data']);
  Route::get('invoice_config/show_edit/{id}', [InvoiceConfigController::class, 'show_edit']);
  Route::get('get_invoice_config', [InvoiceController::class, 'get_invoice_config']);
  Route::post('invoiceConfig_delete/{id}', [InvoiceConfigController::class, 'destroy']);

  // FOR ADMIN REPORT
  Route::get('reports/invoiceReport_load', [InvoiceController::class, 'invoiceReport_load']);
  Route::get('reports/invoiceReport_click', [InvoiceController::class, 'invoiceReport_click']);
  Route::get('reports/deductionReport_load', [InvoiceController::class, 'deductionReport_load']);
  Route::get('reports/deductionReport_click', [InvoiceController::class, 'deductionReport_click']);
  Route::get('reports/deductionDetails/{id}', [InvoiceController::class, 'deductionDetails']);

  // THIS LINE IS FOR USER
  // FOR DASHBOARD PAGE
  Route::get('show_userProfile', [ProfileController::class, 'show_userProfile']);
  Route::get('get_quickInvoiceUser_PDT/{id}', [InvoiceController::class, 'get_quickInvoiceUser_PDT']);
  Route::get('user/check_userActivependingInvoices', [InvoiceController::class, 'check_userActivependingInvoices']); // FOR ACTIVE USER PROFILE STATUS
  Route::get('user/show_userpendingInvoices', [InvoiceController::class, 'show_userpendingInvoices']);
  Route::get('user/show_useroverdueInvoices', [InvoiceController::class, 'show_useroverdueInvoices']);
  Route::get('active_user_paid_invoice_count', [InvoiceController::class, 'active_user_paid_invoice_count']);
  Route::get('active_user_pending_invoice_count', [InvoiceController::class, 'active_user_pending_invoice_count']);
  Route::get('active_user_overdue_invoice_count', [InvoiceController::class, 'active_user_overdue_invoice_count']);
  Route::get('active_user_cancelled_invoice_count', [InvoiceController::class, 'active_user_cancelled_invoice_count']);

  //   FOR PROFILE
  Route::get('getUserInvoiceStatus/{id}', [InvoiceController::class, 'getUserInvoiceStatus']);
  Route::get('user/show_userInvoice', [InvoiceController::class, 'show_userInvoice']); // SHOW ACTIVE USER INVOICES
  Route::get('user/show_userEdit', [ProfileController::class, 'show_userEdit']);
  Route::post('user/updateProfile', [ProfileController::class, 'updateProfile']);
  Route::get('invoice/check_userProfile', [InvoiceController::class, 'check_userProfile']);

  // EDIT INVOICE
  Route::get('user/userEditInvoice/{id}', [InvoiceController::class, 'userEditInvoice']); // EDIT INVOICE VIEW

  // FOR INVOICE
  Route::get('user/search_userstatusActive_invoice', [InvoiceController::class, 'search_userstatusActive_invoice']);
  Route::get('user/search_userstatusInactive_invoice', [InvoiceController::class, 'search_userstatusInactive_invoice']);
  Route::get('user/show_userstatusInactiveinvoice', [InvoiceController::class, 'show_userstatusInactiveinvoice']); // SHOW INACTIVE INVOICES
  Route::get('user/check_userInactiveStatusInvoice', [InvoiceController::class, 'check_userInactiveStatusInvoice']); // FOR INVOICE STATUS INACTIVE CHECK AND UPDATE
  Route::get('user/search_statusInactive_invoice', [InvoiceController::class, 'search_statusInactive_invoice']);

  // FOR USER REPORT
  Route::get('userReports/userInvoiceReport_load', [InvoiceController::class, 'userInvoiceReport_load']);
  Route::get('userReports/userInvoiceReport_click', [InvoiceController::class, 'userInvoiceReport_click']);
  Route::get('userReports/userDeductionReport_load', [InvoiceController::class, 'userDeductionReport_load']);
  Route::get('userReports/userDeductionReport_click', [InvoiceController::class, 'userDeductionReport_click']);
  Route::get('userReports/userDeductionDetails/{id}', [InvoiceController::class, 'userDeductionDetails']);

  Route::get('user_data', [ProfileController::class, 'user_data']);
});

// // TESTING EMAIL 
// Route::get('testEmail', function () {
//   $data = Invoice::with(['profile.user', 'deductions.profile_deduction_types.deduction_type', 'invoice_items'])
//     ->orderBy('id', 'Desc')->first();
//   $data1 = InvoiceConfig::orderBy('id', 'Desc')->first();
//   $data2 = EmailConfig::where('status', 'Active')->get();
//   // echo "<pre>";
//   // echo $data;
//   if ($data && $data1) {
//     foreach ($data2 as $send_admin) {
//       $data_setup_email_template = [
//         // 'invoice_logo'           => 'https://shamcey.5ppsite.com/logo.png',
//         'invoice_logo'           => $data1->invoice_logo,
//         'full_name'              => $data->profile->user->first_name . " " . $data->profile->user->last_name,
//         'user_email'             => $data->profile->user->email,
//         'invoice_no'             => $data->invoice_no,
//         'invoice_status'         => $data->status,
//         'address'                => $data->profile->address,
//         'city'                   => $data->profile->city,
//         'province'               => $data->profile->province,
//         'zip_code'               => $data->profile->zip_code,
//         'date_created'           => CarbonCarbon::parse($data->created_at)->isoFormat('MMMM DD YYYY'),
//         'invoice_title'          => $data1->invoice_title,
//         'due_date'               => CarbonCarbon::parse($data->due_date)->isoFormat('MMMM DD YYYY'),
//         'bill_to_address'        => $data1->bill_to_address,
//         'payment_status'         => $data->invoice_status,
//         'date_received'          => CarbonCarbon::parse($data->date_received)->isoFormat('MMMM DD YYYY'),
//         'ship_to_address'        => $data1->ship_to_address,
//         'balance_due'            => number_format($data->sub_total, 2),
//         'invoice_items'          => $data->invoice_items,
//         'invoice_description'    => $data->description,
//         'sub_total'              => number_format(($data->sub_total + $data->discount_total), 2),
//         'discount_type'          => $data->discount_type,
//         'discount_amount'        => number_format($data->discount_amount, 2),
//         'discount_total'         => number_format($data->discount_total, 2),
//         'peso_rate'              => number_format($data->peso_rate, 2),
//         'converted_amount'       => number_format($data->converted_amount, 2),
//         'deductions'             => $data->deductions,
//         'deductions_total'       => number_format($data->deductions->pluck('amount')->sum(), 2),
//         'notes'                  => $data->notes,
//         'grand_total_amount'     => number_format($data->grand_total_amount, 2),
//         'admin_email'            => $send_admin->email_address,
//         'quick_invoice'          => $data->quick_invoice,
//       ];
//     }
//     echo setup_email_template($data_setup_email_template);
//   }
// });
// function setup_email_template($data)
// {
//   $invoice_logo = !empty($data['invoice_logo']) ? $data['invoice_logo'] : "";
//   $full_name = !empty($data['full_name']) ? $data['full_name'] : "";
//   $user_email = !empty($data['user_email']) ? $data['user_email'] : "";
//   $invoice_no = !empty($data['invoice_no']) ? $data['invoice_no'] : "";
//   $invoice_status = !empty($data['invoice_status']) ? $data['invoice_status'] : "";
//   $address = !empty($data['address']) ? $data['address'] : "";
//   $city = !empty($data['city']) ? $data['city'] : "";
//   $province = !empty($data['province']) ? $data['province'] : "";
//   $zip_code = !empty($data['zip_code']) ? $data['zip_code'] : "";
//   $date_created = !empty($data['date_created']) ? $data['date_created'] : "";
//   $invoice_title = !empty($data['invoice_title']) ? $data['invoice_title'] : "";
//   $due_date = !empty($data['due_date']) ? $data['due_date'] : "";
//   $bill_to_address = !empty($data['bill_to_address']) ? $data['bill_to_address'] : "";
//   $payment_status = !empty($data['payment_status']) ? $data['payment_status'] : "";
//   $text_date_received = !empty($data['text_date_received']) ? $data['text_date_received'] : "";
//   $date_received = !empty($data['date_received']) ? $data['date_received'] : "";
//   $ship_to_address = !empty($data['ship_to_address']) ? $data['ship_to_address'] : "";
//   $balance_due = !empty($data['balance_due']) ? $data['balance_due'] : "";
//   $invoice_items = !empty($data['invoice_items']) ? $data['invoice_items'] : "";
//   $invoice_description = !empty($data['invoice_description']) ? $data['invoice_description'] : "";
//   $sub_total = !empty($data['sub_total']) ? $data['sub_total'] : "";
//   $discount_type = !empty($data['discount_type']) ? $data['discount_type'] : "";
//   $discount_amount = !empty($data['discount_amount']) ? $data['discount_amount'] : "";
//   $discount_total = !empty($data['discount_total']) ? $data['discount_total'] : "";
//   $peso_rate = !empty($data['peso_rate']) ? $data['peso_rate'] : "";
//   $converted_amount = !empty($data['converted_amount']) ? $data['converted_amount'] : "";
//   $deductions = !empty($data['deductions']) ? $data['deductions'] : "";
//   $deductions_total = !empty($data['deductions_total']) ? $data['deductions_total'] : "";
//   $notes = !empty($data['notes']) ? $data['notes'] : "";
//   $grand_total_amount = !empty($data['grand_total_amount']) ? $data['grand_total_amount'] : "";
//   $quick_invoice = !empty($data['quick_invoice']) ? $data['quick_invoice'] : "";

//   $to_name = !empty($data['full_name']) ? $data['full_name'] : "";
//   $to_email = !empty($data['admin_email']) ? $data['admin_email'] : "";
//   $from_name = !empty($data['from_name']) ? $data['from_name'] : env("MIX_APP_NAME");
//   $from_email = !empty($data['from_email']) ?  $data['from_email'] : "ccg@5ppsite.com";
//   $template = !empty($data['template']) ?  $data['template'] : 'email.emailTemplate';
//   $subject = "5 Pints Productions Invoice";

//   if (!empty($data['subject'])) {
//     $subject = $data['subject'];
//   }

//   $data_email = [
//     'to_name'       => $to_name,
//     'to_email'      => $to_email,
//     'subject'       => $subject,
//     'from_name'     => $from_name,
//     'from_email'    => $from_email,
//     'template'      => $template,
//     'body_data'     => [
//       "content" => [
//         'invoice_logo'        => $invoice_logo,
//         'full_name'           => $full_name,
//         'user_email'          => $user_email,
//         'invoice_no'          => $invoice_no,
//         'invoice_status'      => $invoice_status,
//         'address'             => $address,
//         'city'                => $city,
//         'province'            => $province,
//         'zip_code'            => $zip_code,
//         'date_created'        => $date_created,
//         'invoice_title'       => $invoice_title,
//         'due_date'            => $due_date,
//         'bill_to_address'     => $bill_to_address,
//         'payment_status'      => $payment_status,
//         'text_date_received'  => $text_date_received,
//         'date_received'       => $date_received,
//         'ship_to_address'     => $ship_to_address,
//         'balance_due'         => $balance_due,
//         'invoice_items'       => $invoice_items,
//         'invoice_description' => $invoice_description,
//         'sub_total'           => $sub_total,
//         'discount_type'       => $discount_type,
//         'discount_amount'     => $discount_amount,
//         'discount_total'      => $discount_total,
//         'peso_rate'           => $peso_rate,
//         'converted_amount'    => $converted_amount,
//         'deductions'          => $deductions,
//         'deductions_total'    => $deductions_total,
//         'notes'               => $notes,
//         'grand_total_amount'  => $grand_total_amount,
//         'quick_invoice'       => $quick_invoice,

//       ],
//     ]
//   ];
//   event(new \App\Events\SendMailEvent($data_email));
//   return view($template, ['content' => $data_email['body_data']['content']]);
// }

// Route::get('forgot', function () {
//   $users = User::where('email', 'kentoy113@gmail.coom')->first();

//   $token = \Str::random(64);
//   \DB::table('password_resets')->insert([
//     'email' => 'kentoy113@gmail.coom',
//     'token' => $token,
//     'created_at' => Carbon::now(),
//   ]);

//   $data_setup_email_template = [
//     'to'             =>  'kentoy113@gmail.com',
//     'token'          =>  $token,
//     'action_link'    =>  url('password/reset/'),
//   ];
//   echo setup_forgot_password($data_setup_email_template);
// });

// function setup_forgot_password($data)
// {
//   $to = !empty($data['to']) ? $data['to'] : "";
//   $token = !empty($data['token']) ? $data['token'] : "";
//   $action_link = !empty($data['action_link']) ? $data['action_link'] : "";

//   $from_name = !empty($data['from_name']) ? $data['from_name'] : env("MIX_APP_NAME");
//   $from_email = !empty($data['from_email']) ?  $data['from_email'] : "ccg@5ppsite.com";
//   $template = !empty($data['template']) ?  $data['template'] : 'email.email-forgot';
//   $subject = "Reset Password";

//   if (!empty($data['subject'])) {
//     $subject = $data['subject'];
//   }

//   $data_email = [
//     'to_name'       => $to,
//     'to_email'      => $to,
//     'subject'       => $subject,
//     'from_name'     => $from_name,
//     'from_email'    => $from_email,
//     'template'      => $template,
//     'body_data'     => [
//       "content" => [
//         'to'              => $to,
//         'token'           => $token,
//         'action_link'     => $action_link,

//       ],
//     ]
//   ];
//   // event(new \App\Events\SendMailEvent($data_email));
//   return view($template, ['content' => $data_email['body_data']['content']]);
// }