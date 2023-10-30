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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['0', '1', '2'])->nullable();
            $table->string('company_id')->nullable();
            $table->string('jobname')->nullable();
            $table->text('description')->nullable();
            $table->string('department')->nullable();
            $table->string('location')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('workfunction')->nullable();
            $table->string('experience')->nullable();
            $table->string('major')->nullable();
            $table->string('graduate')->nullable();
            $table->string('salary')->nullable();
            $table->string('candidate')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('careers');
    }
};
