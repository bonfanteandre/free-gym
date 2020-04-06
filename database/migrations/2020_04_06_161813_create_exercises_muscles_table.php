<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisesMusclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_muscle', function (Blueprint $table) {
            $table->unsignedBigInteger('exercise_id');
            $table->unsignedBigInteger('muscle_id');

            $table->foreign('exercise_id')
                ->references('id')
                ->on('exercises');

            $table->foreign('muscle_id')
                ->references('id')
                ->on('muscles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercise_muscle');
    }
}
