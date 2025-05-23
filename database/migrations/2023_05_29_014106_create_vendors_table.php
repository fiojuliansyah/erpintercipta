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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->string('company_id')->nullable();
            $table->string('vendorname')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('term_id')->nullable();
            $table->string('taxcategorya_id')->nullable();
            $table->string('taxcategoryb_id')->nullable();
            $table->string('taxnumber')->nullable();
            $table->string('tax_image')->nullable();
            $table->string('taxaddress')->nullable();
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
        Schema::dropIfExists('vendors');
    }
};
