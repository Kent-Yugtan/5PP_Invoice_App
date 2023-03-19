<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropShipToAddressFromInvoiceConfigs extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('invoice_configs', function (Blueprint $table) {
      //
      $table->dropColumn('ship_to_address');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('invoice_configs', function (Blueprint $table) {
      //
    });
  }
}
