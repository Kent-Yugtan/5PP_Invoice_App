<?php

namespace App\Listeners;

use App\Events\SendMailEvent;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\View;

class SendMailListener implements ShouldQueue
{
  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   *
   * @param  \App\Events\SendMailEvent  $event
   * @return void
   */
  public function handle(SendMailEvent $event)
  {
    $mail_data = $event->mail_data;

    $pdf = app(PDF::class);
    $html = View::make('email.pdfTemplate', ['content' => $mail_data['body_data']['content']])->render();
    $pdf->loadHTML($html);
    $pdf_data = $pdf->output();

    // Send email
    $sendmail = Mail::send($mail_data['template'], $mail_data['body_data'], function ($message) use ($mail_data, $pdf_data) {
      $message->to($mail_data['to_email'], $mail_data['to_name'])->subject($mail_data['subject']);

      // Attach PDF to email with the desired filename

      $Invoice = '5PP-Invoice.pdf';
      $message->attachData($pdf_data, $Invoice, [
        'mime' => 'application/pdf',
      ]);
      Log::debug('Attachment Invoice: ' . $Invoice);

      Log::info($mail_data);


      $message->from($mail_data['from_email'], $mail_data['from_name']);
    });
  }
}
