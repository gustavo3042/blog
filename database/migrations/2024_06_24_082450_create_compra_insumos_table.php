<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_insumos', function (Blueprint $table) {
            $table->id();
            $table->integer('venta')->nullable();
          
            $table->unsignedBigInteger('insumo_id');

         
            $table->foreign('insumo_id')->references('id')->on('insumos')->onDelete('cascade');
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
        Schema::dropIfExists('compra_insumos');
    }
}
