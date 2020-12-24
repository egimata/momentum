<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string("slug")->unique();
            $table->string("titlealb");
            $table->string("titlen");
            $table->string("titleit")->nullable();
            $table->longText('descriptionalb');
            $table->longText('descriptionen');
            $table->longText('descriptionit')->nullable();
            $table->string('photo');
            $table->string('mainphoto');
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
        Schema::dropIfExists('projects');
    }
}
