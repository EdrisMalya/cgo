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
        Schema::create('audit_form_members', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->unsignedBigInteger('audit_form_id');
            $table->unsignedBigInteger('auditor_team_id');
            $table->unsignedBigInteger('auditor_member_id');
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
        Schema::dropIfExists('audit_form_members');
    }
};
