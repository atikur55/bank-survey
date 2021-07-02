<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuarantorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guarantor_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('city_type')->nullable();
            $table->string('receiving_date')->nullable();
            $table->string('submission_date')->nullable();
            $table->string('file_name')->nullable();
            $table->integer('fgd_profession')->nullable();
            $table->integer('fgd_profession_val')->nullable();
            $table->string('guarantor_name')->nullable();
            $table->integer('fgd_guarantor')->nullable();
            $table->string('gurantor_relation')->nullable();
            $table->integer('fgd_relationship')->nullable();
            $table->string('gur_company_name')->nullable();
            $table->integer('fgd_company_name')->nullable();
            $table->string('guarantor_degignation')->nullable();
            $table->integer('fgd_designation')->nullable();
            $table->string('guarantor_res_address')->nullable();
            $table->integer('fgd_r_address')->nullable();
            $table->string('office_address')->nullable();
            $table->integer('fgd_o_address')->nullable();
            $table->string('gur_land_phn')->nullable();
            $table->string('gur_mobile')->nullable();
            $table->integer('fgd_contact')->nullable();
            $table->string('gur_amount')->nullable();
            $table->integer('fgd_agree')->nullable();
            $table->string('field_name')->nullable();
            $table->string('signature')->nullable();
            $table->string('qr_code_guarantor')->nullable();
            $table->integer('gen_remarks')->nullable();
            $table->longText('guarantor_rem')->nullable();
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
        Schema::dropIfExists('guarantor_details');
    }
}
