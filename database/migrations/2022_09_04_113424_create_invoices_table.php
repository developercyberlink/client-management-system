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
            $table->foreignId("user_id")
                  ->constrained("users")
                  ->onUpdate("cascade")
                  ->onDelete("cascade");
            $table->float("total")->nullable();
            $table->float("discount")->default(0.0)->nullable();
            $table->float("vat")->default(0.0);     
            $table->string("invoice_no");
            $table->longText("remarks")
                  ->nullable()
                  ->default(null);
            $table->string("status")->nullable();
            $table->string('service_id')->nullable();
            $table->string('invoice_status')->nullable()->default(0);
            $table->string('final_invoice')->nullable();
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
