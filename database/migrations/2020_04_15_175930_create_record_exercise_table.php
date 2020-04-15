<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordExerciseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_exercise', function (Blueprint $table) {
            $table->unsignedBigInteger('record_id');
            $table->unsignedBigInteger('exercise_id');
            $table->integer('series');
            $table->integer('repetitions');

            $table->foreign('record_id')
                ->references('id')
                ->on('records');

            $table->foreign('exercise_id')
                ->references('id')
                ->on('exercises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('record_exercise');
    }
}
