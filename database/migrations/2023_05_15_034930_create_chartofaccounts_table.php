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
        Schema::create('chartofaccounts', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('accounttype_id')->nullable();
            $table->string('accountname')->nullable();
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
        Schema::dropIfExists('chartofaccounts');
    }
};
