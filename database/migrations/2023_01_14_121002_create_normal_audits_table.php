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
        Schema::create('normal_audits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auditor_team_id');
            $table->integer('fiscal_year');
            $table->date('audit_start_date');
            $table->date('audit_end_date');
            $table->date('sent_to_governor_date');
            $table->integer('total_pages');
            $table->unsignedBigInteger('confidentiality_level_id');
            $table->text('governor_office_remarks');
            $table->boolean('sent_to_governor');
            $table->string('file_location');
            $table->string('file_version');
            $table->string('file_manual_sequence_number');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('reported_by');
            $table->unsignedBigInteger('last_updated_by')->default(0);
            $table->unsignedBigInteger('last_seen_by')->default(0);
            $table->unsignedBigInteger('reviewed_by')->default(0);
            $table->date('reviewed_by_date')->nullable();
            $table->unsignedBigInteger('approved_by')->default(0);
            $table->date('approved_by_date')->nullable();
            $table->string('status')->default('new');
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
        Schema::dropIfExists('normal_audits');
    }
};
