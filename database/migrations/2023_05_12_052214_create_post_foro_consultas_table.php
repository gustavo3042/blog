<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostForoConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_foro_consultas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha');
            $table->longText('body');
            $table->enum('status',[1,2])->default(1);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_foros_id');


              $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
              $table->foreign('category_foros_id')->references('id')->on('category_foros')->onDelete('cascade');
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
        Schema::dropIfExists('post_foro_consultas');
    }
}
