<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckListInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumos_check_list', function (Blueprint $table) {
            $table->id();
           // $table->integer('venta')->nullable();
           // $table->integer('compra')->nullable();
            $table->unsignedBigInteger('check_list_id')->nullable();
            $table->unsignedBigInteger('insumo_id');

            $table->foreign('check_list_id')->nullable()->references('id')->on('check_lists')->onDelete('cascade');
            $table->foreign('insumo_id')->nullable()->references('id')->on('insumos')->onDelete('cascade');
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
        Schema::dropIfExists('check_list_insumo');
    }
}
