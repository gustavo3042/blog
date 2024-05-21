<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->string('patente')->nullable();
            $table->string('marca');
            $table->string('modelo');
            $table->string('ano');
            $table->string('color');
            $table->unsignedBigInteger('check_lists_id')->nullable();
           
            $table->foreign('check_lists_id')->nullable()->references('id')->on('check_lists')->onDelete('cascade');
            $table->string('tipoDireccion');
            $table->string('tipoTraccion');
            $table->string('tipoCombustion');
            $table->string('cilindrada');
   
            $table->timestamps();
        });


        Schema::create('check_lists_autos', function (Blueprint $table) {
            $table->id();
            

          
            $table->unsignedBigInteger('check_lists_id');
           
            $table->foreign('check_lists_id')->references('id')->on('check_lists')->onDelete('cascade');
            $table->unsignedBigInteger('autos_id');
           
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
        Schema::dropIfExists('autos');
        Schema::dropIfExists('check_lists_autos');
    }
}
