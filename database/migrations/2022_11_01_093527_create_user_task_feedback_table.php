<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTaskFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_task_feedback', function (Blueprint $table) {
            $table->id();
            $table->longText("message");
            $table->foreignId('user_task_id')
                  ->constrained('user_tasks')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->integer('sender');
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
        Schema::dropIfExists('user_task_feedback');
    }
}
