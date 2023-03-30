<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnInProfiles extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('profiles', function (Blueprint $table) {
      //
      $table->renameColumn('bank_bank_address', 'bank_address')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('profiles', function (Blueprint $table) {
      //
      $table->dropColumn('bank_bank_address');
    });
  }
}
