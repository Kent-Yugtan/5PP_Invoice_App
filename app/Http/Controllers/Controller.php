<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Carbon\Carbon as CarbonCarbon;
use PDF;
use Dompdf\Dompdf as Dompdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    public function generate_invoice()
    {
        // $last_invoice = Invoice::where('profile_id', $profile_id)->orderBy('invoice_no', 'desc')->first();
        $last_invoice = Invoice::orderBy('invoice_no', 'desc')->first();
        $last_num = 0;
        if ($last_invoice) {
            // $last_num = $last_invoice->invoice_no != null ? $last_invoice->invoice_no + 1 : 00001;
            $last_num = (int) str_replace('5PP-', "", $last_invoice->invoice_no);
            $_last_num = str_pad($last_num + 1, 5, '0', STR_PAD_LEFT);
            $last_num = '5PP-' . $_last_num;
        } else {
            // $last_num = 00001;
            $last_num = '5PP-00001';
        }
        // $invoice_num = sprintf("%05d", $last_num);
        return $last_num;
    }

    public function setup_email_template_status_admin($data)
    {
        $admin_email_fullname = !empty($data['admin_email_fullname']) ? $data['admin_email_fullname'] : "";
        $token = !empty($data['token']) ? $data['token'] : "";
        $invoice_logo = !empty($data['invoice_logo']) ? $data['invoice_logo'] : "";
        $full_name = !empty($data['full_name']) ? $data['full_name'] : "";
        $user_email = !empty($data['user_email']) ? $data['user_email'] : "";
        $invoice_id = !empty($data['invoice_id']) ? $data['invoice_id'] : "";
        $invoice_no = !empty($data['invoice_no']) ? $data['invoice_no'] : "";
        $invoice_status = !empty($data['invoice_status']) ? $data['invoice_status'] : "";
        $address = !empty($data['address']) ? $data['address'] : "";
        $city = !empty($data['city']) ? $data['city'] : "";
        $province = !empty($data['province']) ? $data['province'] : "";
        $zip_code = !empty($data['zip_code']) ? $data['zip_code'] : "";
        $date_created = !empty($data['date_created']) ? $data['date_created'] : "";
        $invoice_title = !empty($data['invoice_title']) ? $data['invoice_title'] : "";
        $invoice_email = !empty($data['invoice_email']) ? $data['invoice_email'] : "";
        $due_date = !empty($data['due_date']) ? $data['due_date'] : "";
        $bill_to_address = !empty($data['bill_to_address']) ? $data['bill_to_address'] : "";
        $payment_status = !empty($data['payment_status']) ? $data['payment_status'] : "";
        $text_date_received = !empty($data['text_date_received']) ? $data['text_date_received'] : "";
        $date_received = !empty($data['date_received']) ? $data['date_received'] : "";
        $ship_to_address = !empty($data['ship_to_address']) ? $data['ship_to_address'] : "";
        $balance_due = !empty($data['balance_due']) ? $data['balance_due'] : "";
        $invoice_items = !empty($data['invoice_items']) ? $data['invoice_items'] : "";
        $invoice_description = !empty($data['invoice_description']) ? $data['invoice_description'] : "";
        $sub_total = !empty($data['sub_total']) ? $data['sub_total'] : "";
        $discount_type = !empty($data['discount_type']) ? $data['discount_type'] : "";
        $discount_amount = !empty($data['discount_amount']) ? $data['discount_amount'] : "";
        $discount_total = !empty($data['discount_total']) ? $data['discount_total'] : "";
        $peso_rate = !empty($data['peso_rate']) ? $data['peso_rate'] : "";
        $converted_amount = !empty($data['converted_amount']) ? $data['converted_amount'] : "";
        $deductions = !empty($data['deductions']) ? $data['deductions'] : "";
        $deductions_total = !empty($data['deductions_total']) ? $data['deductions_total'] : "";
        $notes = !empty($data['notes']) ? $data['notes'] : "";
        $grand_total_amount = !empty($data['grand_total_amount']) ? $data['grand_total_amount'] : "";
        $quick_invoice = !empty($data['quick_invoice']) ? $data['quick_invoice'] : "";

        $to_name = !empty($data['full_name']) ? $data['full_name'] : "";
        $to_email = !empty($data['admin_email']) ? $data['admin_email'] : "";
        $from_name = !empty($data['from_name']) ? $data['from_name'] : env("MIX_APP_NAME");
        $from_email = !empty($data['from_email']) ?  $data['from_email'] : "invoice@5ppsite.com";
        $template = !empty($data['template']) ?  $data['template'] : 'email.emailTemplate';
        $subject = "5PP Invoice # " . $invoice_no . ": " . $full_name;
        // . " (" . $payment_status . ")"

        if (!empty($data['subject'])) {
            $subject = $data['subject'];
        }

        $data_email = [
            'forgot'        => 0,
            'to_name'       => $to_name,
            'to_email'      => $to_email,
            'subject'       => $subject,
            'from_name'     => $from_name,
            'from_email'    => $from_email,
            'template'      => $template,
            'body_data'     => [
                "content" => [
                    'for'                 => 'Admin',
                    'admin_email_fullname' => $admin_email_fullname,
                    'invoice_logo'        => $invoice_logo,
                    'full_name'           => $full_name,
                    'user_email'          => $user_email,
                    'invoice_no'          => $invoice_no,
                    'invoice_id'          => $invoice_id,
                    'invoice_status'      => $invoice_status,
                    'address'             => $address,
                    'city'                => $city,
                    'province'            => $province,
                    'zip_code'            => $zip_code,
                    'date_created'        => $date_created,
                    'invoice_title'       => $invoice_title,
                    'invoice_email'       => $invoice_email,
                    'due_date'            => $due_date,
                    'bill_to_address'     => $bill_to_address,
                    'payment_status'      => $payment_status,
                    'text_date_received'  => $text_date_received,
                    'date_received'       => $date_received,
                    'ship_to_address'     => $ship_to_address,
                    'balance_due'         => $balance_due,
                    'invoice_items'       => $invoice_items,
                    'invoice_description' => $invoice_description,
                    'sub_total'           => $sub_total,
                    'discount_type'       => $discount_type,
                    'discount_amount'     => $discount_amount,
                    'discount_total'      => $discount_total,
                    'peso_rate'           => $peso_rate,
                    'converted_amount'    => $converted_amount,
                    'deductions'          => $deductions,
                    'deductions_total'    => $deductions_total,
                    'notes'               => $notes,
                    'grand_total_amount'  => $grand_total_amount,
                    'quick_invoice'       => $quick_invoice,
                    'token'               => $token,
                    'action_link'            =>  url('admin/invoiceInfo/'),
                ],
            ]
        ];
        event(new \App\Events\SendMailEvent($data_email));
    }

    public function setup_email_template_status_profile($data)
    {
        $apiUrl = !empty($data['apiUrl']) ? $data['apiUrl'] : "";
        $token = !empty($data['token']) ? $data['token'] : "";
        $invoice_logo = !empty($data['invoice_logo']) ? $data['invoice_logo'] : "";
        $full_name = !empty($data['full_name']) ? $data['full_name'] : "";
        $user_email = !empty($data['user_email']) ? $data['user_email'] : "";
        $invoice_id = !empty($data['invoice_id']) ? $data['invoice_id'] : "";
        $invoice_no = !empty($data['invoice_no']) ? $data['invoice_no'] : "";
        $invoice_status = !empty($data['invoice_status']) ? $data['invoice_status'] : "";
        $address = !empty($data['address']) ? $data['address'] : "";
        $city = !empty($data['city']) ? $data['city'] : "";
        $province = !empty($data['province']) ? $data['province'] : "";
        $zip_code = !empty($data['zip_code']) ? $data['zip_code'] : "";
        $date_created = !empty($data['date_created']) ? $data['date_created'] : "";
        $invoice_title = !empty($data['invoice_title']) ? $data['invoice_title'] : "";
        $invoice_email = !empty($data['invoice_email']) ? $data['invoice_email'] : "";
        $due_date = !empty($data['due_date']) ? $data['due_date'] : "";
        $bill_to_address = !empty($data['bill_to_address']) ? $data['bill_to_address'] : "";
        $payment_status = !empty($data['payment_status']) ? $data['payment_status'] : "";
        $text_date_received = !empty($data['text_date_received']) ? $data['text_date_received'] : "";
        $date_received = !empty($data['date_received']) ? $data['date_received'] : "";
        $ship_to_address = !empty($data['ship_to_address']) ? $data['ship_to_address'] : "";
        $balance_due = !empty($data['balance_due']) ? $data['balance_due'] : "";
        $invoice_items = !empty($data['invoice_items']) ? $data['invoice_items'] : "";
        $invoice_description = !empty($data['invoice_description']) ? $data['invoice_description'] : "";
        $sub_total = !empty($data['sub_total']) ? $data['sub_total'] : "";
        $discount_type = !empty($data['discount_type']) ? $data['discount_type'] : "";
        $discount_amount = !empty($data['discount_amount']) ? $data['discount_amount'] : "";
        $discount_total = !empty($data['discount_total']) ? $data['discount_total'] : "";
        $peso_rate = !empty($data['peso_rate']) ? $data['peso_rate'] : "";
        $converted_amount = !empty($data['converted_amount']) ? $data['converted_amount'] : "";
        $deductions = !empty($data['deductions']) ? $data['deductions'] : "";
        $deductions_total = !empty($data['deductions_total']) ? $data['deductions_total'] : "";
        $notes = !empty($data['notes']) ? $data['notes'] : "";
        $grand_total_amount = !empty($data['grand_total_amount']) ? $data['grand_total_amount'] : "";
        $quick_invoice = !empty($data['quick_invoice']) ? $data['quick_invoice'] : "";

        $to_name = !empty($data['full_name']) ? $data['full_name'] : "";
        $to_email = !empty($data['user_email']) ? $data['user_email'] : "";
        $from_name = !empty($data['from_name']) ? $data['from_name'] : env("MIX_APP_NAME");
        $from_email = !empty($data['from_email']) ?  $data['from_email'] : "invoice@5ppsite.com";
        $template = !empty($data['template']) ?  $data['template'] : 'email.emailTemplate';
        $subject = "5PP Invoice # " . $invoice_no . ": " . $full_name;
        // . " (" . $payment_status . ")"

        if (!empty($data['subject'])) {
            $subject = $data['subject'];
        }

        $data_email = [
            'forgot'        => 0,
            'to_name'       => $to_name,
            'to_email'      => $to_email,
            'subject'       => $subject,
            'from_name'     => $from_name,
            'from_email'    => $from_email,
            'template'      => $template,
            'body_data'     => [
                "content" => [
                    'for'                 => 'Profile',
                    'invoice_logo'        => $invoice_logo,
                    'full_name'           => $full_name,
                    'user_email'          => $user_email,
                    'invoice_id'          => $invoice_id,
                    'invoice_no'          => $invoice_no,
                    'invoice_status'      => $invoice_status,
                    'address'             => $address,
                    'city'                => $city,
                    'province'            => $province,
                    'zip_code'            => $zip_code,
                    'date_created'        => $date_created,
                    'invoice_title'       => $invoice_title,
                    'invoice_email'       => $invoice_email,
                    'due_date'            => $due_date,
                    'bill_to_address'     => $bill_to_address,
                    'payment_status'      => $payment_status,
                    'text_date_received'  => $text_date_received,
                    'date_received'       => $date_received,
                    'ship_to_address'     => $ship_to_address,
                    'balance_due'         => $balance_due,
                    'invoice_items'       => $invoice_items,
                    'invoice_description' => $invoice_description,
                    'sub_total'           => $sub_total,
                    'discount_type'       => $discount_type,
                    'discount_amount'     => $discount_amount,
                    'discount_total'      => $discount_total,
                    'peso_rate'           => $peso_rate,
                    'converted_amount'    => $converted_amount,
                    'deductions'          => $deductions,
                    'deductions_total'    => $deductions_total,
                    'notes'               => $notes,
                    'grand_total_amount'  => $grand_total_amount,
                    'quick_invoice'       => $quick_invoice,
                    'token'               => $token,
                    'action_link'         =>  url('admin/invoiceInfoProfile/'),
                    'apiUrl'              => $apiUrl,

                ],
            ]
        ];
        event(new \App\Events\SendMailEvent($data_email));
    }

    public function setup_email_template_admin($data)
    {
        $apiUrl = !empty($data['apiUrl']) ? $data['apiUrl'] : "";
        $token = !empty($data['token']) ? $data['token'] : "";
        $admin_email_fullname = !empty($data['admin_email_fullname']) ? $data['admin_email_fullname'] : "";
        $invoice_logo = !empty($data['invoice_logo']) ? $data['invoice_logo'] : "";
        $full_name = !empty($data['full_name']) ? $data['full_name'] : "";
        $user_id = !empty($data['user_id']) ? $data['user_id'] : "";
        $user_email = !empty($data['user_email']) ? $data['user_email'] : "";
        $invoice_id = !empty($data['invoice_id']) ? $data['invoice_id'] : "";
        $invoice_no = !empty($data['invoice_no']) ? $data['invoice_no'] : "";
        $invoice_status = !empty($data['invoice_status']) ? $data['invoice_status'] : "";
        $address = !empty($data['address']) ? $data['address'] : "";
        $city = !empty($data['city']) ? $data['city'] : "";
        $province = !empty($data['province']) ? $data['province'] : "";
        $zip_code = !empty($data['zip_code']) ? $data['zip_code'] : "";
        $date_created = !empty($data['date_created']) ? $data['date_created'] : "";
        $invoice_title = !empty($data['invoice_title']) ? $data['invoice_title'] : "";
        $invoice_email = !empty($data['invoice_email']) ? $data['invoice_email'] : "";
        $due_date = !empty($data['due_date']) ? $data['due_date'] : "";
        $bill_to_address = !empty($data['bill_to_address']) ? $data['bill_to_address'] : "";
        $payment_status = !empty($data['payment_status']) ? $data['payment_status'] : "";
        $text_date_received = !empty($data['text_date_received']) ? $data['text_date_received'] : "";
        $date_received = !empty($data['date_received']) ? $data['date_received'] : "";
        $ship_to_address = !empty($data['ship_to_address']) ? $data['ship_to_address'] : "";
        $balance_due = !empty($data['balance_due']) ? $data['balance_due'] : "";
        $invoice_items = !empty($data['invoice_items']) ? $data['invoice_items'] : "";
        $invoice_description = !empty($data['invoice_description']) ? $data['invoice_description'] : "";
        $sub_total = !empty($data['sub_total']) ? $data['sub_total'] : "";
        $discount_type = !empty($data['discount_type']) ? $data['discount_type'] : "";
        $discount_amount = !empty($data['discount_amount']) ? $data['discount_amount'] : "";
        $discount_total = !empty($data['discount_total']) ? $data['discount_total'] : "";
        $peso_rate = !empty($data['peso_rate']) ? $data['peso_rate'] : "";
        $converted_amount = !empty($data['converted_amount']) ? $data['converted_amount'] : "";
        $deductions = !empty($data['deductions']) ? $data['deductions'] : "";
        $deductions_total = !empty($data['deductions_total']) ? $data['deductions_total'] : "";
        $notes = !empty($data['notes']) ? $data['notes'] : "";
        $grand_total_amount = !empty($data['grand_total_amount']) ? $data['grand_total_amount'] : "";
        $quick_invoice = !empty($data['quick_invoice']) ? $data['quick_invoice'] : "";

        $to_name = !empty($data['full_name']) ? $data['full_name'] : "";
        $to_email = !empty($data['admin_email']) ? $data['admin_email'] : "";
        $from_name = !empty($data['from_name']) ? $data['from_name'] : env("MIX_APP_NAME");
        $from_email = !empty($data['from_email']) ?  $data['from_email'] : "invoice@5ppsite.com";
        $template = !empty($data['template']) ?  $data['template'] : 'email.emailTemplate';
        $subject = "5PP Invoice # " . $invoice_no . ": " . $full_name;
        // . " (" . $payment_status . ")"

        if (!empty($data['subject'])) {
            $subject = $data['subject'];
        }

        $data_email = [
            'forgot'        => 0,
            'to_name'       => $to_name,
            'to_email'      => $to_email,
            'subject'       => $subject,
            'from_name'     => $from_name,
            'from_email'    => $from_email,
            'template'      => $template,
            'body_data'     => [
                "content" => [
                    'for'                 => 'Admin',
                    'admin_email_fullname' => $admin_email_fullname,
                    'invoice_logo'        => $invoice_logo,
                    'full_name'           => $full_name,
                    'user_id'             => $user_id,
                    'user_email'          => $user_email,
                    'invoice_id'          => $invoice_id,
                    'invoice_no'          => $invoice_no,
                    'invoice_status'      => $invoice_status,
                    'address'             => $address,
                    'city'                => $city,
                    'province'            => $province,
                    'zip_code'            => $zip_code,
                    'date_created'        => $date_created,
                    'invoice_title'       => $invoice_title,
                    'invoice_email'       => $invoice_email,
                    'due_date'            => $due_date,
                    'bill_to_address'     => $bill_to_address,
                    'payment_status'      => $payment_status,
                    'text_date_received'  => $text_date_received,
                    'date_received'       => $date_received,
                    'ship_to_address'     => $ship_to_address,
                    'balance_due'         => $balance_due,
                    'invoice_items'       => $invoice_items,
                    'invoice_description' => $invoice_description,
                    'sub_total'           => $sub_total,
                    'discount_type'       => $discount_type,
                    'discount_amount'     => $discount_amount,
                    'discount_total'      => $discount_total,
                    'peso_rate'           => $peso_rate,
                    'converted_amount'    => $converted_amount,
                    'deductions'          => $deductions,
                    'deductions_total'    => $deductions_total,
                    'notes'               => $notes,
                    'grand_total_amount'  => $grand_total_amount,
                    'quick_invoice'       => $quick_invoice,
                    'token'               => $token,
                    'action_link'         =>  url('admin/invoiceInfo/'),
                    'apiUrl'              => $apiUrl,
                ],
            ]
        ];
        event(new \App\Events\SendMailEvent($data_email));
    }

    public function setup_email_template_profile($data)
    {
        $apiUrl = !empty($data['apiUrl']) ? $data['apiUrl'] : "";
        $token = !empty($data['token']) ? $data['token'] : "";
        $invoice_logo = !empty($data['invoice_logo']) ? $data['invoice_logo'] : "";
        $full_name = !empty($data['full_name']) ? $data['full_name'] : "";
        $user_id = !empty($data['user_id']) ? $data['user_id'] : "";
        $user_email = !empty($data['user_email']) ? $data['user_email'] : "";
        $invoice_id = !empty($data['invoice_id']) ? $data['invoice_id'] : "";
        $invoice_no = !empty($data['invoice_no']) ? $data['invoice_no'] : "";
        $invoice_status = !empty($data['invoice_status']) ? $data['invoice_status'] : "";
        $address = !empty($data['address']) ? $data['address'] : "";
        $city = !empty($data['city']) ? $data['city'] : "";
        $province = !empty($data['province']) ? $data['province'] : "";
        $zip_code = !empty($data['zip_code']) ? $data['zip_code'] : "";
        $date_created = !empty($data['date_created']) ? $data['date_created'] : "";
        $invoice_title = !empty($data['invoice_title']) ? $data['invoice_title'] : "";
        $invoice_email = !empty($data['invoice_email']) ? $data['invoice_email'] : "";
        $due_date = !empty($data['due_date']) ? $data['due_date'] : "";
        $bill_to_address = !empty($data['bill_to_address']) ? $data['bill_to_address'] : "";
        $payment_status = !empty($data['payment_status']) ? $data['payment_status'] : "";
        $text_date_received = !empty($data['text_date_received']) ? $data['text_date_received'] : "";
        $date_received = !empty($data['date_received']) ? $data['date_received'] : "";
        $ship_to_address = !empty($data['ship_to_address']) ? $data['ship_to_address'] : "";
        $balance_due = !empty($data['balance_due']) ? $data['balance_due'] : "";
        $invoice_items = !empty($data['invoice_items']) ? $data['invoice_items'] : "";
        $invoice_description = !empty($data['invoice_description']) ? $data['invoice_description'] : "";
        $sub_total = !empty($data['sub_total']) ? $data['sub_total'] : "";
        $discount_type = !empty($data['discount_type']) ? $data['discount_type'] : "";
        $discount_amount = !empty($data['discount_amount']) ? $data['discount_amount'] : "";
        $discount_total = !empty($data['discount_total']) ? $data['discount_total'] : "";
        $peso_rate = !empty($data['peso_rate']) ? $data['peso_rate'] : "";
        $converted_amount = !empty($data['converted_amount']) ? $data['converted_amount'] : "";
        $deductions = !empty($data['deductions']) ? $data['deductions'] : "";
        $deductions_total = !empty($data['deductions_total']) ? $data['deductions_total'] : "";
        $notes = !empty($data['notes']) ? $data['notes'] : "";
        $grand_total_amount = !empty($data['grand_total_amount']) ? $data['grand_total_amount'] : "";
        $quick_invoice = !empty($data['quick_invoice']) ? $data['quick_invoice'] : "";

        $to_name = !empty($data['full_name']) ? $data['full_name'] : "";
        $to_email = !empty($data['user_email']) ? $data['user_email'] : "";
        $from_name = !empty($data['from_name']) ? $data['from_name'] : env("MIX_APP_NAME");
        $from_email = !empty($data['from_email']) ?  $data['from_email'] : "invoice@5ppsite.com";
        $template = !empty($data['template']) ?  $data['template'] : 'email.emailTemplate';
        $subject = "5PP Invoice # " . $invoice_no . ": " . $full_name;
        // . " (" . $payment_status . ")"

        if (!empty($data['attachment'])) {
            $attachment = $data['attachment'];
        }
        if (!empty($data['subject'])) {
            $subject = $data['subject'];
        }

        $data_email = [
            'forgot'        => 0,
            'to_name'       => $to_name,
            'to_email'      => $to_email,
            'subject'       => $subject,
            'from_name'     => $from_name,
            'from_email'    => $from_email,
            'template'      => $template,
            'body_data'     => [
                "content" => [
                    'for'                 => 'Profile',
                    'invoice_logo'        => $invoice_logo,
                    'full_name'           => $full_name,
                    'user_id'             => $user_id,
                    'user_email'          => $user_email,
                    'invoice_id'          => $invoice_id,
                    'invoice_no'          => $invoice_no,
                    'invoice_status'      => $invoice_status,
                    'address'             => $address,
                    'city'                => $city,
                    'province'            => $province,
                    'zip_code'            => $zip_code,
                    'date_created'        => $date_created,
                    'invoice_title'       => $invoice_title,
                    'invoice_email'       => $invoice_email,
                    'due_date'            => $due_date,
                    'bill_to_address'     => $bill_to_address,
                    'payment_status'      => $payment_status,
                    'text_date_received'  => $text_date_received,
                    'date_received'       => $date_received,
                    'ship_to_address'     => $ship_to_address,
                    'balance_due'         => $balance_due,
                    'invoice_items'       => $invoice_items,
                    'invoice_description' => $invoice_description,
                    'sub_total'           => $sub_total,
                    'discount_type'       => $discount_type,
                    'discount_amount'     => $discount_amount,
                    'discount_total'      => $discount_total,
                    'peso_rate'           => $peso_rate,
                    'converted_amount'    => $converted_amount,
                    'deductions'          => $deductions,
                    'deductions_total'    => $deductions_total,
                    'notes'               => $notes,
                    'grand_total_amount'  => $grand_total_amount,
                    'quick_invoice'       => $quick_invoice,
                    'token'               => $token,
                    'apiUrl'               => $apiUrl,
                    'action_link'         =>  url('admin/invoiceInfoProfile/'),
                ],
            ]
        ];
        event(new \App\Events\SendMailEvent($data_email));
    }

    function setup_forgot_password($data)
    {
        $invoice_logo = !empty($data['invoice_logo']) ? $data['invoice_logo'] : "";
        $to = !empty($data['to']) ? $data['to'] : "";
        $token = !empty($data['token']) ? $data['token'] : "";
        $action_link = !empty($data['action_link']) ? $data['action_link'] : "";

        $from_name = !empty($data['from_name']) ? $data['from_name'] : env("MIX_APP_NAME");
        $from_email = !empty($data['from_email']) ?  $data['from_email'] : "invoice@5ppsite.com";
        $template = !empty($data['template']) ?  $data['template'] : 'email.email-forgot';
        $subject = "Reset Password";

        if (!empty($data['subject'])) {
            $subject = $data['subject'];
        }

        $data_email = [
            'forgot'        => 1,
            'to_name'       => $to,
            'to_email'      => $to,
            'subject'       => $subject,
            'from_name'     => $from_name,
            'from_email'    => $from_email,
            'template'      => $template,
            'body_data'     => [
                "content" => [
                    'invoice_logo'    => $invoice_logo,
                    'to'              => $to,
                    'token'           => $token,
                    'action_link'     => $action_link,
                ],
            ]
        ];
        event(new \App\Events\SendMailEvent($data_email));
    }
}
