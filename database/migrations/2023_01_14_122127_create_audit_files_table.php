<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('audit_form_id');
            $table->string('file');
            $table->string('file_type');
            $table->string('file_name');
            $table->string('file_size');
            $table->string('file_ext');
            $table->unsignedBigInteger('uploaded_by');
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
        Schema::dropIfExists('audit_files');
    }
};
