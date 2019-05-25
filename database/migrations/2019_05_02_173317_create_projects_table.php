<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void//
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',55);
            $table->string('description',200);
            $table->string('category',55);
            $table->double('yearMonth',6,0);
            $table->string('langs', 200);
            $table->boolean('image');
            $table->string('i_filename')->nullable();
            $table->string('i_mime')->nullable();
            $table->string('i_url')->nullable();
            $table->string('url',55)->nullable();
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
