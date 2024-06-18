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
        Schema::create('check_list_insumos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('check_list_id');
            $table->unsignedBigInteger('insumos_id');

            $table->foreign('check_list_id')->references('id')->on('check_lists')->onDelete('cascade');
            $table->foreign('insumos_id')->references('id')->on('insumos')->onDelete('cascade');
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
        Schema::dropIfExists('check_list_insumos');
    }
}
