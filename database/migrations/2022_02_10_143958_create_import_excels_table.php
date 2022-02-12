<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportExcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_excels', function (Blueprint $table) {
            $table->id();
            $table->string('experience')->nullable();
            $table->string('phase')->nullable();
            $table->string('body_part')->nullable();
            $table->string('plan_section')->nullable();
            $table->integer('total_row')->nullable();
            $table->string('set_type')->nullable();
            $table->string('set_row')->nullable();
            $table->string('target_muscle')->nullable();
            $table->string('training_form')->nullable();
            $table->string('training_type')->nullable();
            $table->string('equipment')->nullable();
            $table->integer('muscle_equip_exercise')->nullable();
            $table->string('age_group')->nullable();
            $table->string('load')->nullable();
            $table->string('exercise_code')->nullable();
            $table->string('exercise')->nullable();
            $table->string('set_w_c')->nullable();
            $table->string('rep_w_c')->nullable();
            $table->string('duration_w_c')->nullable();
            $table->string('note_w_c')->nullable();
            $table->string('cardio_form_c')->nullable();
            $table->string('work_rest_c')->nullable();
            $table->string('rep_c')->nullable();
            $table->string('duration_c')->nullable();
            $table->string('meta_data')->nullable();
            $table->string('meta_description')->nullable();
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
        Schema::dropIfExists('import_excels');
    }
}
