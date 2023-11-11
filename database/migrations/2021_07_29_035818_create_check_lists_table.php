<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_lists', function (Blueprint $table) {
            $table->id();
            $table->string('encargado');
            $table->date('fecha');
            $table->enum('status',[1,2])->default(1);
            $table->text('problema')->nullable();
            $table->text('solucion')->nullable();
            $table->string('patente');

            $table->unsignedBigInteger('user_id');
           //$table->unsignedBigInteger('client_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('statusNow',[0,1])->default(1);

          // $table->foreign('client_id')->references('id')->on('failed_jobs')->onDelete('cascade');



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
        Schema::dropIfExists('check_lists');
    }
}
