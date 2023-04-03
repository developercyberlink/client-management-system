<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleHierarchiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_hierarchies', function (Blueprint $table) {
            $table->id();
            $table->foreignId("role_id")
                  ->constrained("roles")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
            $table->integer("parent_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_hierarchies');
    }
}
