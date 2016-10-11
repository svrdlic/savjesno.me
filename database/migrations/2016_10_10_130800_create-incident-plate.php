<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentPlate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_plate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('incident_id')->unsigned()->index();
            $table->foreign('incident_id')->references('id')->on('incidents')->onDelete('cascade');
            $table->integer('plate_id')->unsigned()->index();
            $table->foreign('plate_id')->references('id')->on('plates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incident_plate');
    }
}
