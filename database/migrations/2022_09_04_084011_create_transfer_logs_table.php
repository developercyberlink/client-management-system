<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("assign_task_id")
                  ->constrained("admin_has_tasks")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
            $table->foreignId("transferred_by")
                  ->constrained("admins")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
            $table->foreignId("transferred_to")
                  ->constrained("admins")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
            $table->longText("remarks")->nullable();
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
        Schema::dropIfExists('transfer_logs');
    }
}
