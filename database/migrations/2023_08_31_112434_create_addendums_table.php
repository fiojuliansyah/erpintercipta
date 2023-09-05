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
        Schema::create('addendums', function (Blueprint $table) {
            $table->id();
            $table->text('addendum');
            $table->text('skk');
            $table->string('reference_number');
            $table->string('company_id')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('date')->nullable();
            $table->string('date_abjad')->nullable();
            $table->string('month')->nullable();
            $table->string('month_abjad')->nullable();
            $table->string('year')->nullable();
            $table->string('year_abjad')->nullable();
            $table->string('project')->nullable();
            $table->string('area')->nullable();
            $table->string('salary')->nullable();
            $table->string('allowance')->nullable();
            $table->string('place')->nullable();
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
        Schema::dropIfExists('addendums');
    }
};
