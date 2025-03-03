<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('profession');
            $table->text('service');
            $table->text('degree');
            $table->text('scientific');
            $table->text('position');
            $table->text('languages');
            $table->longText('bio');
            $table->text('news');
            $table->text('cursed');
            $table->text('images');
            $table->text('videos');
            $table->text('cases');
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
        Schema::dropIfExists('doctors');
    }
}
