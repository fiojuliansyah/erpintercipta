<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->string('area')->nullable();
            $table->string('salary')->nullable();
            $table->string('department_allowance')->nullable();
            $table->string('attendance_allowance')->nullable();
            $table->string('comunication_allowance')->nullable();
            $table->string('beauty_allowance')->nullable();
            $table->string('food_allowance')->nullable();
            $table->string('transport_allowance')->nullable();
            $table->string('location_allowance')->nullable();
            $table->string('other_non_fix_allowance')->nullable();
            $table->string('department')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('place')->nullable();
            $table->string('year')->nullable();
            $table->string('romawi')->nullable();
            $table->string('title')->nullable();
            $table->string('responsible')->nullable();
            $table->string('addendum_id')->nullable();
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
        Schema::dropIfExists('agreements');
    }
};
