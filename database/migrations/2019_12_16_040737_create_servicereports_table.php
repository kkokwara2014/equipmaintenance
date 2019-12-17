<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicereportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicereports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('servicenum');
            $table->integer('equipment_id');
            $table->string('servicedate');
            $table->string('serviceduedate');
            $table->text('servicereason');
            $table->string('servicedby');
            $table->string('phone');
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
        Schema::dropIfExists('servicereports');
    }
}
