<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id();
            $table->string('total')->nullable();
            $table->string('iva')->nullable();
            $table->string('subtotal')->nullable();
        
        
            $table->unsignedBigInteger('check_lists_id');
          
 
             $table->foreign('check_lists_id')->references('id')->on('check_lists')->onDelete('cascade');
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
        Schema::dropIfExists('presupuestos');
    }
}
