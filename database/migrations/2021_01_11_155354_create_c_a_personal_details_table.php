<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCAPersonalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_a_personal_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('city_type')->nullable();
            $table->string('receiving_date')->nullable();
            $table->string('submission_date')->nullable();
            $table->string('file_name')->nullable();
            $table->string('ca_appli_name')->nullable();
            $table->integer('ca_pd_name')->nullable();
            $table->string('ca_current_resi')->nullable();
            $table->integer('ca_pd_cresidence')->nullable();
            $table->string('ca_land_phn')->nullable();
            $table->integer('ca_pd_landP')->nullable();
            $table->string('ca_mobile_no')->nullable();
            $table->integer('ca_pd_mp')->nullable();
            $table->string('ca_spous_name')->nullable();
            $table->integer('ca_pd_sname')->nullable();
            $table->string('ca_work_address')->nullable();
            $table->integer('ca_pd_swa')->nullable();
            $table->integer('ebd_designation')->nullable();
            $table->integer('residential_size')->nullable();
            $table->string('ca_year')->nullable();
            $table->string('ca_month')->nullable();
            $table->string('ca_con_name')->nullable();
            $table->string('ca_con_date')->nullable();
            $table->string('ca_con_time')->nullable();
            $table->string('field_agent')->nullable();
            $table->string('signature')->nullable();
            $table->string('ca_qr_per_code')->nullable();
            $table->integer('gen_remarks')->nullable();
            $table->longText('personal_rem')->nullable();
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
        Schema::dropIfExists('c_a_personal_details');
    }
}
