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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->date('date')->nullable();
            $table->string('clock_in')->nullable();
            $table->string('image_in')->nullable();
            $table->string('long_in')->nullable();
            $table->string('lat_in')->nullable();
            $table->string('clock_out')->nullable();
            $table->string('image_out')->nullable();
            $table->string('long_out')->nullable();
            $table->string('lat_out')->nullable();
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
        Schema::dropIfExists('attendances');
    }
};
