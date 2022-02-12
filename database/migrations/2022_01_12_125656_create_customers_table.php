<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('length')->nullable();
            $table->string('shoulder')->nullable();
            $table->string('neck')->nullable();
            $table->string('chest')->nullable();
            $table->string('waist')->nullable();
            $table->string('hip')->nullable();
            $table->string('gheera_gool')->nullable();
            $table->string('gheera_choras')->nullable();
            $table->string('arm')->nullable();
            $table->string('moda')->nullable();
            $table->string('kaff')->nullable();
            $table->string('kaff_width')->nullable();
            $table->string('arm_gool')->nullable();
            $table->string('arm_moori')->nullable();
            $table->string('collar')->nullable();
            $table->string('bean')->nullable();
            $table->string('shalwar_length')->nullable();
            $table->string('shalwar_gheera')->nullable();
            $table->string('shalwar_paincha')->nullable();
            $table->string('pocket_front')->nullable();
            $table->string('pocket_side')->nullable();
            $table->string('pocket_shalwar')->nullable();
            $table->string('pent_length')->nullable();
            $table->string('pent_waist')->nullable();
            $table->string('pent_hip')->nullable();
            $table->string('pent_paincha')->nullable();
            $table->string('single_salai')->nullable();
            $table->string('double_salai')->nullable();
            $table->string('triple_salai')->nullable();
            $table->string('design')->nullable();
            $table->string('book_no')->nullable();
            $table->string('design_no')->nullable();
            $table->integer('suit_quantity')->nullable();
            $table->integer('total_price')->nullable();
            $table->string('add_price')->nullable();
            $table->string('note')->nullable();



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
        Schema::dropIfExists('customers');
    }
}
