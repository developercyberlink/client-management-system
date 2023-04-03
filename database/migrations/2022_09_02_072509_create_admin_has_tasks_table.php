<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminHasTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_has_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')
                  ->constrained('admins')
                  ->nullable()
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
            $table->foreignId('task_id')
                  ->constrained('tasks')
                  ->nullable()
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
            $table->longText("remark")->nullable();
            $table->integer("status")->default(0);
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
        Schema::dropIfExists('admin_has_tasks');
    }
}
