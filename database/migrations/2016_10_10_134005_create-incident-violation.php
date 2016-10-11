<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentViolation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_violation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('incident_id')->unsigned()->index();
            $table->foreign('incident_id')->references('id')->on('incidents')->onDelete('cascade');
            $table->integer('violation_id')->unsigned()->index();
            $table->foreign('violation_id')->references('id')->on('violations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incident_violation');
    }
}
