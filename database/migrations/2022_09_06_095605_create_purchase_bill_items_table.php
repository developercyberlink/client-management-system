<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseBillItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_bill_items', function (Blueprint $table) {
            $table->id();
            $table->string("particular")->nullable();
            $table->float("rate")->nullable();
            $table->integer("amount")->nullable();
            $table->foreignId("purchase_bill_id")
                  ->constrained("purchase_bills")
                  ->onUpdate("cascade")
                  ->onDelete("cascade");
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
        Schema::dropIfExists('purchase_bill_items');
    }
}
