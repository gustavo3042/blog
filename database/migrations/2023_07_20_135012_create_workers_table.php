<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


  

    public function up()
    {
        Schema::create('afps', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->timestamps();
        });


        Schema::create('tipo_contratos', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('workers', function (Blueprint $table) {
            $table->id();
          
            $table->string('name');
            $table->string('name2');
            $table->string('surname');
            $table->string('surname2');
            $table->string('rut')->unique();
            $table->date('birthDate');
            $table->integer('sex')->nullable();
            $table->boolean('status')->default(1);
            $table->string('address');
            $table->string('phone')->nullable();
            $table->integer('Afp')->nullable();
            $table->string('email')->unique()->nullable();
            $table->integer('tipoContrato')->nullable();
            $table->date('fechaContrato')->nullable();
            $table->date('suspensionContrato')->nullable();
            $table->date('finiquito')->nullable();
            $table->string('causalFinContrato')->nullable();
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
        Schema::dropIfExists('workers');
        Schema::dropIfExists('afps');
        Schema::dropIfExists('tipo_contratos');
    }
}
