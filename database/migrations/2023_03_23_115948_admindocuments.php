<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admindocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_documents', function (Blueprint $table) {
            $table->id();            
            $table->foreignId('admin_id')                  
                  ->onDelete('cascade');
            $table->string('title')->nullable();                 
            $table->string('file')->nullable();            
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
         Schema::dropIfExists('admin_documents');
    }
}
