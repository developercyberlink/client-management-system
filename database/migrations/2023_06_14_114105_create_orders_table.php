<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->foreignId('user_id')->onDelete('cascade');
            $table->foreignId('service_id')->onDelete('cascade');
            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('price')->nullable();
            $table->enum('status', [0, 1, 2, 3]);
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
        Schema::dropIfExists('orders');
    }
}
