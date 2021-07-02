<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_statements', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('city_type')->nullable();
            $table->string('receiving_date')->nullable();
            $table->string('submission_date')->nullable();
            $table->string('file_name')->nullable();
            $table->string('sta_appli_name')->nullable();
            $table->string('sta_bank_name')->nullable();
            $table->string('sta_brance_name')->nullable();
            $table->string('sta_account_title')->nullable();
            $table->string('sta_account_no')->nullable();
            $table->string('sta_verify')->nullable();
            $table->string('sta_designation')->nullable();
            $table->string('sta_land_no')->nullable();
            $table->string('sta_mobile_no')->nullable();
            $table->string('verify_date')->nullable();
            $table->string('statement_check')->nullable();
            $table->string('qr_code_statement')->nullable();
            $table->string('field_agent')->nullable();
            $table->string('signature')->nullable();
            $table->integer('gen_remarks')->nullable();
            $table->longText('bank_remarks')->nullable();
            $table->string('cs_photo')->default('cs_photo.jpg');
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
        Schema::dropIfExists('bank_statements');
    }
}
