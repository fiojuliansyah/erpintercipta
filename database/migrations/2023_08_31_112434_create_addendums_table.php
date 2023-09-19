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
            $table->string('company_id')->nullable();
            $table->longText('addendum')->nullable();
            $table->string('responsible')->nullable();
            $table->text('attachment_1')->nullable();
            $table->text('attachment_2')->nullable();
            $table->string('project')->nullable();
            $table->string('area')->nullable();
            $table->string('place')->nullable();
            $table->string('year')->nullable();
            $table->string('romawi')->nullable();
            $table->string('title')->nullable();
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
