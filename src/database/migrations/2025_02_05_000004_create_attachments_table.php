<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_path');
            $table->unsignedInteger('attachable_id');
            $table->string('attachable_type');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
}
