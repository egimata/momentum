<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantexpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicantexps', function (Blueprint $table) {
            $table->id();
            $table->string("position");
            $table->mediumText("activities")->nullable();
            $table->string("employer");
            $table->string("employer_city")->nullable();
            $table->string("employer_country")->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('applicant_id');
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
        Schema::dropIfExists('applicantexps');
    }
}
