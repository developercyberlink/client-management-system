<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId("vendor_id")
                  ->nullable()
                  ->constrained("vendors")
                  ->onUpdate("cascade")
                  ->onDelete("set null");
            $table->float("total")->nullable();
            $table->float("discount")->default(0.0);
            $table->float("vat")->default(0.0);     
            $table->string("bill_no");
            $table->longText("remarks")
                  ->nullable()
                  ->default(null);
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
        Schema::dropIfExists('purchase_bills');
    }
}
