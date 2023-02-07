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
        Schema::create('audit_form_files_authorize_downloader_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('audit_form_id');
            $table->unsignedBigInteger('user_id');
            $table->string('type');
            $table->unsignedBigInteger('created_by');
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
        Schema::dropIfExists('audit_form_files_authorize_downloader_users');
    }
};
