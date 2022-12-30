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
            $table->string('trabajo');
            $table->string('descripcion');
            $table->string('cantidad');
            $table->string('precio');
            $table->string('amount');

            $table->unsignedBigInteger('presupuestos_id');
          
 
            $table->foreign('presupuestos_id')->references('id')->on('presupuestos')->onDelete('cascade');
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
        Schema::dropIfExists('presupuesto_details');
    }
}
