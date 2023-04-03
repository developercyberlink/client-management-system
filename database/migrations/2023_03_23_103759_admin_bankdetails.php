<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdminBankdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('admin_bank_details', function (Blueprint $table) {
            $table->id();            
            $table->foreignId('admin_id')                  
                  ->onDelete('cascade');
            $table->string('acc_name')->nullable();                 
            $table->string('acc_num')->nullable();
            $table->string('bank')->nullable();
            $table->string('branch')->nullable();
            $table->string('pan_num')->nullable();
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
        Schema::dropIfExists('admin_bank_details');
    }
}
