<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutsTable extends Migration
{
    public function up()
    {
        Schema::create('workouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('exercise_id');
            $table->integer('repetitions');
            $table->decimal('weight');
            $table->integer('break_time');
            $table->enum('day', ['SEGUNDA', 'TERÇA', 'QUARTA', 'QUINTA', 'SEXTA', 'SÁBADO', 'DOMINGO']);
            $table->text('observations')->nullable();
            $table->integer('time');
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('exercise_id')->references('id')->on('exercises');

            // Índice único para evitar treinos duplicados no mesmo dia
            $table->unique(['student_id', 'exercise_id', 'day']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('workouts');
    }
}
