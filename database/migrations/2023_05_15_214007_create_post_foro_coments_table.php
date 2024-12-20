<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostForoComentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_foro_coments', function (Blueprint $table) {
            $table->id();
            $table->text('bodyComent');
            $table->date('fechaComent');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_foro_consultas_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_foro_consultas_id')->references('id')->on('post_foro_consultas')->onDelete('cascade');
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
        Schema::dropIfExists('post_foro_coments');
    }
}
