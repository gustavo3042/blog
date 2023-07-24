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

        Schema::create('absences', function (Blueprint $table) {
            $table->id();
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

        
        Schema::create('check_lists_workers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('check_lists_id');
            $table->unsignedBigInteger('workers_id');
            $table->foreign('check_lists_id')->references('id')->on('check_lists')->onDelete('cascade');
            $table->foreign('workers_id')->references('id')->on('workers')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('check_lists_id')->nullable()->references('id')->on('check_lists')->onDelete("cascade");
            $table->foreignId('workers_id')->nullable()->references('id')->on('check_lists_workers')->onDelete("cascade");
            $table->integer('cantidad')->nullable();
            $table->decimal('rendimiento', 5,1 )->nullable();
            $table->integer('pagodiario')->nullable();
            $table->integer('porcentaje')->nullable();
            $table->integer('pagoporcentaje')->nullable();

        
            $table->timestamps();
        });

        Schema::create('assistances', function (Blueprint $table) {
            $table->id();

            $table->foreignId('check_lists_id')->nullable()->references('id')->on('check_lists')->onDelete("cascade");
            $table->foreignId('workers_id')->nullable()->references('id')->on('check_lists_workers')->onDelete("cascade");
            $table->boolean('presente')->default(0);

            $table->foreignId('inasistencia_id')->nullable()->references('id')->on('absences')->onDelete("cascade")->default(1);

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
        
        Schema::dropIfExists('afps');
        Schema::dropIfExists('tipo_contratos');
        Schema::dropIfExists('absences');
        Schema::dropIfExists('workers');
        Schema::dropIfExists('check_lists_workers');
        Schema::dropIfExists('productions');
        Schema::dropIfExists('assistances');
        
       
       
    }
}
