<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagTaskTable extends Migration
{
    public function up()
    {
        Schema::create('tag_task', function (Blueprint $table) {
            $table->unsignedInteger('task_id');
            $table->unsignedInteger('tag_id');

            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->primary(['task_id', 'tag_id']);
        });
    }
    public function down()
    {
        Schema::dropIfExists('tag_task');
    }
}
