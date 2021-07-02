<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('city_type')->nullable();
            $table->string('receiving_date')->nullable();
            $table->string('submission_date')->nullable();
            $table->string('file_name')->nullable();
            $table->integer('ebd_profession')->nullable();
            $table->integer('prof_valid')->nullable();
            $table->string('company_name')->nullable();
            $table->integer('ebd_company')->nullable();
            $table->string('office_address')->nullable();
            $table->integer('ebd_office_address')->nullable();
            $table->string('land_phone')->nullable();
            $table->string('mobile_number')->nullable();
            $table->integer('ebd_office_phone')->nullable();
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->string('employee')->nullable();
            $table->integer('ebd_serv_len')->nullable();
            $table->string('business')->nullable();
            $table->integer('ebd_nat_bus')->nullable();
            $table->string('designation')->nullable();
            $table->integer('ebd_designation')->nullable();
            $table->integer('ebd_sal_serv')->nullable();
            $table->string('salary_verify')->nullable();
            $table->integer('ebd_salVname')->nullable();
            $table->integer('ebd_bpstatus')->nullable();
            $table->integer('ebd_bplace')->nullable();
            $table->integer('ebd_bus_off')->nullable();
            $table->string('field_name')->nullable();
            $table->string('signature')->nullable();
            $table->string('qr_code_employee')->nullable();
            $table->integer('gen_remarks')->nullable();
            $table->longText('salary_rem')->nullable();
            $table->longText('employee_rem')->nullable();
            $table->integer('verify')->nullable();
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
        Schema::dropIfExists('employee_details');
    }
}
