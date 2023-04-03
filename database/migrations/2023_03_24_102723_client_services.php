<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_services', function (Blueprint $table) {
            $table->id();
            $table->string("client_id");
            $table->string("service")->nullable();
            $table->string("service_type")->nullable();
            $table->string("programming_type")->nullable();
            $table->string("domain")->nullable();
            $table->string("price")->nullable();
            $table->string("registered")->nullable();
            $table->string("expiring")->nullable();
            $table->string("status")->nullable();
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
       Schema::dropIfExists('client_services');
    }
}
