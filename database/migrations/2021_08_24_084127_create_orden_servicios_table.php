<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_servicios', function (Blueprint $table) {
            $table->id();


            $table->string('encargado');
            $table->date('fecha');
            $table->enum('status',[1,2])->default(1);
            $table->text('problema')->nullable();
            $table->text('solucion')->nullable();
            $table->string('patente');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('auto_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


           $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');

           $table->foreign('auto_id')->references('id')->on('autos')->onDelete('cascade');

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
        Schema::dropIfExists('orden_servicios');
    }
}
