<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParsonalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parsonal_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('city_type')->nullable();
            $table->string('receiving_date')->nullable();
            $table->string('submission_date')->nullable();
            $table->string('file_name')->nullable();
            $table->string('applicants_name')->nullable();
            $table->integer('applicants_answer')->nullable();
            $table->string('house_of')->nullable();
            $table->string('address')->nullable();
            $table->string('road_no')->nullable();
            $table->integer('current_residence')->nullable();
            $table->string('land_phone')->nullable();
            $table->integer('residential_land_phn')->nullable();
            $table->string('per_mobile_no')->nullable();
            $table->integer('mobile_no')->nullable();
            $table->string('spouse')->nullable();
            $table->integer('spouses_name')->nullable();
            $table->string('work')->nullable();
            $table->integer('work_address')->nullable();
            $table->integer('residential_status')->nullable();
            $table->integer('residence_size')->nullable();
            $table->integer('year')->nullable();
            $table->integer('month')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('relation')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('contact_date')->nullable();
            $table->string('field_name')->nullable();
            $table->string('signature')->nullable();
            $table->string('cs_qr_personal')->nullable();
            $table->integer('gen_remarks')->nullable();
            $table->longText('personal_rem')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('parsonal_details');
    }
}
