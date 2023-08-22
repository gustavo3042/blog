<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correo');

            $table->unsignedBigInteger('check_lists_id');
           
            $table->foreign('check_lists_id')->references('id')->on('check_lists')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('check_lists_clientes', function (Blueprint $table) {
            $table->id();
         

            $table->unsignedBigInteger('check_lists_id');
           
            $table->foreign('check_lists_id')->references('id')->on('check_lists')->onDelete('cascade');
            $table->unsignedBigInteger('clientes_id');
           
            $table->foreign('clientes_id')->references('id')->on('clientes')->onDelete('cascade');
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
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('check_lists_clientes');
    }
}
