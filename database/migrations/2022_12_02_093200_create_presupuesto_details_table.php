<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuesto_details', function (Blueprint $table) {
            $table->id();
            $table->string('trabajo')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('cantidadRepuestos')->nullable();
            $table->string('precioRepuestos')->nullable();
            $table->string('totalRepuestos')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('precio')->nullable();
            $table->string('amount')->nullable();

            $table->unsignedBigInteger('presupuestos_id');
          
 
            $table->foreign('presupuestos_id')->references('id')->on('presupuestos')->onDelete('cascade');
         //   $table->timestamps();
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presupuesto_details');
    }
}
