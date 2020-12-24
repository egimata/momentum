<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantedusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicantedus', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("org_name");
            $table->string("org_city")->nullable();
            $table->string("org_country")->nullable();
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
        Schema::dropIfExists('applicantedus');
    }
}
