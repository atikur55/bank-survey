<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCABankStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_a_bank_statements', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('city_type')->nullable();
            $table->string('receiving_date')->nullable();
            $table->string('submission_date')->nullable();
            $table->string('file_name')->nullable();
            $table->string('ca_app_name')->nullable();
            $table->string('ca_bank_name')->nullable();
            $table->string('ca_branch_name')->nullable();
            $table->string('ca_account_title')->nullable();
            $table->string('ca_account_no')->nullable();
            $table->string('ca_verify_name')->nullable();
            $table->string('ca_designation')->nullable();
            $table->string('ca_land')->nullable();
            $table->string('ca_mobile')->nullable();
            $table->string('ca_varify_date')->nullable();
            $table->string('ca_check_verify')->nullable();
            $table->string('field_agent')->nullable();
            $table->string('signature')->nullable();
            $table->string('ca_qr_bank')->nullable();
            $table->integer('gen_remarks')->nullable();
            $table->longText('bank_remarks')->nullable();
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
        Schema::dropIfExists('c_a_bank_statements');
    }
}
