<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('profiles', function (Blueprint $table) {
      $table->id();
      $table->integer('user_id')->unassigned();
      $table->string('full_name')->nullable();
      $table->string('position')->nullable();
      $table->string('phone_number')->nullable();
      $table->string('address')->nullable();
      $table->string('province')->nullable();
      $table->string('city')->nullable();
      $table->string('zip_code')->nullable();
      $table->string('profile_status')->nullable();
      $table->string('acct_no')->nullable();
      $table->string('acct_name')->nullable();
      $table->string('bank_name')->nullable();
      $table->string('bank_address')->nullable();
      $table->string('gcash_no')->nullable();
      $table->date('date_hired')->nullable();
      $table->string('file_name')->nullable();
      $table->string('file_original_name')->nullable();
      $table->longText('file_path')->nullable();
      $table->string('file_size')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('profiles');
  }
}
