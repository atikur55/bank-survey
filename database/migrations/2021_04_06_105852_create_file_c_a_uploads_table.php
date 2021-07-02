<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileCAUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_c_a_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('filename')->nullable();
            $table->string('agent_name')->nullable();
            $table->string('receving_date')->nullable();
            $table->string('submission_date')->nullable();
            $table->string('task')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('file_c_a_uploads');
    }
}
