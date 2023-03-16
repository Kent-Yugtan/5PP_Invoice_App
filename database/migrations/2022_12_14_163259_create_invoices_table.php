<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('profile_id')->unassigned();
            $table->string('invoice_no')->nullable();
            $table->string('description')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('peso_rate')->nullable();
            $table->string('converted_amount')->nullable();
            $table->string('discount_type')->nullable();
            $table->string('discount_amount')->nullable();
            $table->string('discount_total')->nullable();
            $table->string('grand_total_amount')->nullable();
            $table->string('invoice_status')->nullable();
            $table->string('created_by')->nullable();
            $table->date('date_received')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}