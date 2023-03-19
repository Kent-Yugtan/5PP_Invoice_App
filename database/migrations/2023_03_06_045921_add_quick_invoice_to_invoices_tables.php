<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuickInvoiceToInvoicesTables extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('invoices', function (Blueprint $table) {
      //
      $table->string("quick_invoice")->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('invoices', function (Blueprint $table) {
      //

      $table->dropColumn("quick_invoice");
    });
  }
}
