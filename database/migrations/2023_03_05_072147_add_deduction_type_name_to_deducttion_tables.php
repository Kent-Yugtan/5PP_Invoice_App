<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeductionTypeNameToDeducttionTables extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('deductions', function (Blueprint $table) {
      //
      $table->string('deduction_type_name')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('deductions', function (Blueprint $table) {
      //
      $table->dropColumn('deduction_type_name');
    });
  }
}
