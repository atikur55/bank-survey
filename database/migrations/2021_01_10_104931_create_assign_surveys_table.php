<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_surveys', function (Blueprint $table) {
            $table->id();
            $table->string('agent_name')->nullable();
            $table->string('filename')->nullable();
            $table->integer('file_type')->nullable();
            $table->string('zone')->nullable();
            $table->string('task')->nullable();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('assign_surveys');
    }
}
