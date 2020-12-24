<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantlangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicantlangs', function (Blueprint $table) {
            $table->id();
            $table->string("language");
            $table->string("listening")->nullable();
            $table->string("reading")->nullable();
            $table->string("spoken_interaction")->nullable();
            $table->string("spoken_production")->nullable();
            $table->string("writing")->nullable();
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
        Schema::dropIfExists('applicantlangs');
    }
}
