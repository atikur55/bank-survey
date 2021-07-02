<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCAEmploymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_a_employment_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('city_type')->nullable();
            $table->string('receiving_date')->nullable();
            $table->string('submission_date')->nullable();
            $table->string('file_name')->nullable();
            $table->integer('ebd_profession')->nullable();
            $table->integer('prof_valid')->nullable();
            $table->string('ca_company_name')->nullable();
            $table->integer('ebd_company')->nullable();
            $table->string('ca_office_address')->nullable();
            $table->string('ebd_office_address')->nullable();
            $table->string('ca_land_phn')->nullable();
            $table->string('ca_mobile_no')->nullable();
            $table->integer('ebd_office_phone')->nullable();
            $table->string('ca_year')->nullable();
            $table->string('ca_month')->nullable();
            $table->string('num_of_employee')->nullable();
            $table->integer('ebd_serv_len')->nullable();
            $table->string('ca_nature_busi')->nullable();
            $table->integer('ebd_nat_bus')->nullable();
            $table->string('ca_designation')->nullable();
            $table->integer('ebd_designation')->nullable();
            $table->integer('verify')->nullable();
            $table->integer('ebd_sal_serv')->nullable();
            $table->string('ca_salary_verify')->nullable();
            $table->integer('ebd_salVname')->nullable();
            $table->integer('ebd_bpstatus')->nullable();
            $table->integer('ebd_bplace')->nullable();
            $table->integer('ebd_bus_off')->nullable();
            $table->string('field_agent')->nullable();
            $table->string('signature')->nullable();
            $table->string('ca_qr_employment')->nullable();
            $table->integer('gen_remarks')->nullable();
            $table->longText('employee_rem')->nullable();
            $table->longText('salary_rem')->nullable();
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
        Schema::dropIfExists('c_a_employment_details');
    }
}
