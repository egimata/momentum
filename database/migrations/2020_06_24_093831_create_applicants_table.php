<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string("fname");
            $table->string("lname");
            $table->string("address")->nullable();
            $table->string("city")->nullable();
            $table->string("country")->nullable();
            $table->string("phone");
            $table->string("email");
            $table->date('birthdate')->nullable();
            $table->string("mother_language")->nullable();
            $table->mediumText('social_skills')->nullable();
            $table->mediumText('organisational_skills')->nullable();
            $table->mediumText('jobrelated_skills')->nullable();
            $table->mediumText('computer_skills')->nullable();
            $table->integer('career_id');
            $table->string("other_document")->nullable();
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
        Schema::dropIfExists('applicants');
    }
}
