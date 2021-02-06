<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semanas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_curso');
            $table->foreign('id_curso')->references('id')->on('cursos');

            $table->unsignedBigInteger('id_horario');
            $table->foreign('id_horario')->references('id')->on('horarios');

            $table->string('dia_semana', 50);
            $table->string('abrev', 1);

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
        Schema::dropIfExists('semanas');
    }
}
