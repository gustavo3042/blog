<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_insumos', function (Blueprint $table) {
            $table->id();
            $table->integer('venta')->nullable();
            $table->integer('precioVenta')->nullable();
            $table->integer('stockInicial')->nullable();
            $table->integer('stockPostVenta')->nullable();
            $table->integer('totalVenta')->nullable();
            $table->date('fechaVenta')->nullable();
            $table->unsignedBigInteger('check_list_id')->nullable();
            $table->unsignedBigInteger('insumo_id');

            $table->foreign('check_list_id')->nullable()->references('id')->on('check_lists')->onDelete('cascade');
            $table->foreign('insumo_id')->references('id')->on('insumos')->onDelete('cascade');

          /*   $table->timestamp('timestamps')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps(); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta_insumos');
    }
}
