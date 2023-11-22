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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('status')->nullable();
            $table->text('description_user')->nullable();
            $table->text('description_client')->nullable();
            $table->string('site_id')->nullable();
            $table->string('career_id')->nullable();
            $table->string('date')->nullable();
            $table->string('responsible')->nullable();
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
        Schema::dropIfExists('trainings');
    }
};
