<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKilometrajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kilometrajes', function (Blueprint $table) {
            $table->id();
            $table->string('tipoAceite');
            $table->integer('kilometraje');
            $table->integer('newKilometraje');
            $table->integer('mostKilometraje');
            $table->unsignedBigInteger('check_lists_id')->nullable();
            $table->unsignedBigInteger('autos_id');
           
            $table->foreign('check_lists_id')->nullable()->references('id')->on('check_lists')->onDelete('cascade');
            $table->foreign('autos_id')->references('id')->on('autos')->onDelete('cascade');
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
        Schema::dropIfExists('kilometrajes');
    }
}
