<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_configs', function (Blueprint $table) {
            $table->id();
            $table->longText('invoice_logo')->nullable();
            $table->string('invoice_title')->nullable();
            $table->string('invoice_email')->unique();
            $table->string('bill_to_address')->nullable();
            $table->string('ship_to_address')->nullable();
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
        Schema::dropIfExists('invoice_configs');
    }
}