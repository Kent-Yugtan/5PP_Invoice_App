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
    $invoice_logo = !empty($data['invoice_logo']) ? $data['invoice_logo'] : "";
    $full_name = !empty($data['full_name']) ? $data['full_name'] : "";
    $user_email = !empty($data['user_email']) ? $data['user_email'] : "";
    $invoice_no = !empty($data['invoice_no']) ? $data['invoice_no'] : "";
    $invoice_status = !empty($data['invoice_status']) ? $data['invoice_status'] : "";
    $address = !empty($data['address']) ? $data['address'] : "";
    $city = !empty($data['city']) ? $data['city'] : "";
    $province = !empty($data['province']) ? $data['province'] : "";
    $zip_code = !empty($data['zip_code']) ? $data['zip_code'] : "";
    $date_created = !empty($data['date_created']) ? $data['date_created'] : "";
    $invoice_title = !empty($data['invoice_title']) ? $data['invoice_title'] : "";
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
    $from_email = !empty($data['from_email']) ?  $data['from_email'] : "ccg@5ppsite.com";
    $template = !empty($data['template']) ?  $data['template'] : 'email.emailTemplate';
    $subject = "5 Pints Productions Invoice - Admin Status Paid";

    if (!empty($data['subject'])) {
      $subject = $data['subject'];
    }

    $data_email = [
      'to_name'       => $to_name,
      'to_email'      => $to_email,
      'subject'       => $subject,
      'from_name'     => $from_name,
      'from_email'    => $from_email,
      'template'      => $template,
      'body_data'     => [
        "content" => [
          'invoice_logo'        => $invoice_logo,
          'full_name'           => $full_name,
          'user_email'          => $user_email,
          'invoice_no'          => $invoice_no,
          'invoice_status'      => $invoice_status,
          'address'             => $address,
          'city'                => $city,
          'province'            => $province,
          'zip_code'            => $zip_code,
          'date_created'        => $date_created,
          'invoice_title'       => $invoice_title,
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

        ],
      ]
    ];
    // $pdf = new Dompdf();
    // $html = view('email.pdfTemplate', ['content' => $data_email['body_data']['content']])->render();
    // $pdf->loadHtml($html);
    // $pdf->setPaper('A4', 'portrait');
    // $pdf->render();

    // $pdfContent = $pdf->output(); // Get the binary string of the PDF content
    // $directory = storage_path('/app/public/pdf/Status-Admin');
    // if (!is_dir($directory)) {
    //   mkdir($directory, 0777, true);
    // }
    // file_put_contents(storage_path() . '/' . 'app/public/pdf/Status-Admin/5PP-Invoice.pdf', $pdfContent); // Write the content to the file

    // if (file_exists(storage_path() . '/' . 'app/public/pdf/Status-Admin/5PP-Invoice.pdf')) {
    //   // set the file permissions
    //   $data_email += [
    //     'attachment' => [
    //       'url' =>  storage_path() . '/' . 'app/public/pdf/Status-Admin/5PP-Invoice.pdf',
    //       'as' => '5PP-Invoice.pdf',
    //     ],
    //   ];
    // }
    event(new \App\Events\SendMailEvent($data_email));
  }

  public function setup_email_template_status_profile($data)
  {
    $invoice_logo = !empty($data['invoice_logo']) ? $data['invoice_logo'] : "";
    $full_name = !empty($data['full_name']) ? $data['full_name'] : "";
    $user_email = !empty($data['user_email']) ? $data['user_email'] : "";
    $invoice_no = !empty($data['invoice_no']) ? $data['invoice_no'] : "";
    $invoice_status = !empty($data['invoice_status']) ? $data['invoice_status'] : "";
    $address = !empty($data['address']) ? $data['address'] : "";
    $city = !empty($data['city']) ? $data['city'] : "";
    $province = !empty($data['province']) ? $data['province'] : "";
    $zip_code = !empty($data['zip_code']) ? $data['zip_code'] : "";
    $date_created = !empty($data['date_created']) ? $data['date_created'] : "";
    $invoice_title = !empty($data['invoice_title']) ? $data['invoice_title'] : "";
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
    $from_email = !empty($data['from_email']) ?  $data['from_email'] : "ccg@5ppsite.com";
    $template = !empty($data['template']) ?  $data['template'] : 'email.emailTemplate';
    $subject = "5 Pints Productions Invoice - Staff Paid Status";

    if (!empty($data['subject'])) {
      $subject = $data['subject'];
    }

    $data_email = [
      'to_name'       => $to_name,
      'to_email'      => $to_email,
      'subject'       => $subject,
      'from_name'     => $from_name,
      'from_email'    => $from_email,
      'template'      => $template,
      'body_data'     => [
        "content" => [
          'invoice_logo'        => $invoice_logo,
          'full_name'           => $full_name,
          'user_email'          => $user_email,
          'invoice_no'          => $invoice_no,
          'invoice_status'      => $invoice_status,
          'address'             => $address,
          'city'                => $city,
          'province'            => $province,
          'zip_code'            => $zip_code,
          'date_created'        => $date_created,
          'invoice_title'       => $invoice_title,
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

        ],
      ]
    ];
    // $pdf = new Dompdf();
    // $html = view('email.pdfTemplate', ['content' => $data_email['body_data']['content']])->render();
    // $pdf->loadHtml($html);
    // $pdf->setPaper('A4', 'portrait');
    // $pdf->render();

    // $pdfContent = $pdf->output(); // Get the binary string of the PDF content
    // $directory = storage_path('/app/public/pdf/Status-Staff');
    // if (!is_dir($directory)) {
    //   mkdir($directory, 0777, true);
    // }
    // file_put_contents(storage_path() . '/' . 'app/public/pdf/Status-Staff/5PP-Invoice.pdf', $pdfContent); // Write the content to the file

    // if (file_exists(storage_path() . '/' . 'app/public/pdf/Status-Staff/5PP-Invoice.pdf')) {
    //   // set the file permissions
    //   $data_email += [
    //     'attachment' => [
    //       'url' =>  storage_path() . '/' . 'app/public/pdf/Status-Staff/5PP-Invoice.pdf',
    //       'as' => '5PP-Invoice.pdf',
    //     ],
    //   ];
    // }
    event(new \App\Events\SendMailEvent($data_email));
  }

  public function setup_email_template_admin($data)
  {
    $invoice_logo = !empty($data['invoice_logo']) ? $data['invoice_logo'] : "";
    $full_name = !empty($data['full_name']) ? $data['full_name'] : "";
    $user_email = !empty($data['user_email']) ? $data['user_email'] : "";
    $invoice_no = !empty($data['invoice_no']) ? $data['invoice_no'] : "";
    $invoice_status = !empty($data['invoice_status']) ? $data['invoice_status'] : "";
    $address = !empty($data['address']) ? $data['address'] : "";
    $city = !empty($data['city']) ? $data['city'] : "";
    $province = !empty($data['province']) ? $data['province'] : "";
    $zip_code = !empty($data['zip_code']) ? $data['zip_code'] : "";
    $date_created = !empty($data['date_created']) ? $data['date_created'] : "";
    $invoice_title = !empty($data['invoice_title']) ? $data['invoice_title'] : "";
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
    $from_email = !empty($data['from_email']) ?  $data['from_email'] : "ccg@5ppsite.com";
    $template = !empty($data['template']) ?  $data['template'] : 'email.emailTemplate';
    $subject = "5 Pints Productions Invoice - Admin";

    if (!empty($data['subject'])) {
      $subject = $data['subject'];
    }

    $data_email = [
      'to_name'       => $to_name,
      'to_email'      => $to_email,
      'subject'       => $subject,
      'from_name'     => $from_name,
      'from_email'    => $from_email,
      'template'      => $template,
      'body_data'     => [
        "content" => [
          'invoice_logo'        => $invoice_logo,
          'full_name'           => $full_name,
          'user_email'          => $user_email,
          'invoice_no'          => $invoice_no,
          'invoice_status'      => $invoice_status,
          'address'             => $address,
          'city'                => $city,
          'province'            => $province,
          'zip_code'            => $zip_code,
          'date_created'        => $date_created,
          'invoice_title'       => $invoice_title,
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

        ],
      ]
    ];
    // $pdf = new Dompdf();
    // $html = view('email.pdfTemplate', ['content' => $data_email['body_data']['content']])->render();
    // $pdf->loadHtml($html);
    // $pdf->setPaper('A4', 'portrait');
    // $pdf->render();

    // $pdfContent = $pdf->output(); // Get the binary string of the PDF content
    // $directory = storage_path('/app/public/pdf/Invoice-Admin');
    // if (!is_dir($directory)) {
    //   mkdir($directory, 0777, true);
    // }
    // file_put_contents(storage_path() . '/' . 'app/public/pdf/Invoice-Admin/5PP-Invoice.pdf', $pdfContent); // Write the content to the file
    // if (file_exists(storage_path() . '/' . 'app/public/pdf/Invoice-Admin/5PP-Invoice.pdf')) {
    //   // set the file permissions
    //   $data_email += [
    //     'attachment' => [
    //       'url' =>  storage_path() . '/' . 'app/public/pdf/Invoice-Admin/5PP-Invoice.pdf',
    //       'as' => '5PP-Invoice.pdf',
    //     ],
    //   ];
    // }
    event(new \App\Events\SendMailEvent($data_email));
  }

  public function setup_email_template_profile($data)
  {
    $invoice_logo = !empty($data['invoice_logo']) ? $data['invoice_logo'] : "";
    $full_name = !empty($data['full_name']) ? $data['full_name'] : "";
    $user_email = !empty($data['user_email']) ? $data['user_email'] : "";
    $invoice_no = !empty($data['invoice_no']) ? $data['invoice_no'] : "";
    $invoice_status = !empty($data['invoice_status']) ? $data['invoice_status'] : "";
    $address = !empty($data['address']) ? $data['address'] : "";
    $city = !empty($data['city']) ? $data['city'] : "";
    $province = !empty($data['province']) ? $data['province'] : "";
    $zip_code = !empty($data['zip_code']) ? $data['zip_code'] : "";
    $date_created = !empty($data['date_created']) ? $data['date_created'] : "";
    $invoice_title = !empty($data['invoice_title']) ? $data['invoice_title'] : "";
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
    $from_email = !empty($data['from_email']) ?  $data['from_email'] : "ccg@5ppsite.com";
    $template = !empty($data['template']) ?  $data['template'] : 'email.emailTemplate';
    $subject = "5 Pints Productions Invoice - Staff";

    if (!empty($data['attachment'])) {
      $attachment = $data['attachment'];
    }
    if (!empty($data['subject'])) {
      $subject = $data['subject'];
    }

    $data_email = [
      'to_name'       => $to_name,
      'to_email'      => $to_email,
      'subject'       => $subject,
      'from_name'     => $from_name,
      'from_email'    => $from_email,
      'template'      => $template,
      'body_data'     => [
        "content" => [
          'invoice_logo'        => $invoice_logo,
          'full_name'           => $full_name,
          'user_email'          => $user_email,
          'invoice_no'          => $invoice_no,
          'invoice_status'      => $invoice_status,
          'address'             => $address,
          'city'                => $city,
          'province'            => $province,
          'zip_code'            => $zip_code,
          'date_created'        => $date_created,
          'invoice_title'       => $invoice_title,
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
        ],
      ]
    ];
    // $pdf = new Dompdf();
    // $html = view('email.pdfTemplate', ['content' => $data_email['body_data']['content']])->render();
    // $pdf->loadHtml($html);
    // $pdf->setPaper('A4', 'portrait');
    // $pdf->render();

    // $pdfContent = $pdf->output(); // Get the binary string of the PDF content
    // $directory = storage_path('/app/public/pdf/Invoice-Staff');
    // if (!is_dir($directory)) {
    //   mkdir($directory, 0777, true);
    // }
    // file_put_contents(storage_path() . '/' . 'app/public/pdf/Invoice-Staff/5PP-Invoice.pdf', $pdfContent); // Write the content to the file

    // if (file_exists(storage_path() . '/' . 'app/public/pdf/Invoice-Staff/5PP-Invoice.pdf')) {
    //   // set the file permissions
    //   $data_email += [
    //     'attachment' => [
    //       'url' =>  storage_path() . '/' . 'app/public/pdf/Invoice-Staff/5PP-Invoice.pdf',
    //       'as' => '5PP-Invoice.pdf',
    //     ],
    //   ];
    // }
    event(new \App\Events\SendMailEvent($data_email));
  }

  function setup_forgot_password($data)
  {
    $to = !empty($data['to']) ? $data['to'] : "";
    $token = !empty($data['token']) ? $data['token'] : "";
    $action_link = !empty($data['action_link']) ? $data['action_link'] : "";

    $from_name = !empty($data['from_name']) ? $data['from_name'] : env("MIX_APP_NAME");
    $from_email = !empty($data['from_email']) ?  $data['from_email'] : "ccg@5ppsite.com";
    $template = !empty($data['template']) ?  $data['template'] : 'email.email-forgot';
    $subject = "Reset Password";

    if (!empty($data['subject'])) {
      $subject = $data['subject'];
    }

    $data_email = [
      'to_name'       => $to,
      'to_email'      => $to,
      'subject'       => $subject,
      'from_name'     => $from_name,
      'from_email'    => $from_email,
      'template'      => $template,
      'body_data'     => [
        "content" => [
          'to'              => $to,
          'token'           => $token,
          'action_link'     => $action_link,
        ],
      ]
    ];
    event(new \App\Events\SendMailEvent($data_email));
  }
}
