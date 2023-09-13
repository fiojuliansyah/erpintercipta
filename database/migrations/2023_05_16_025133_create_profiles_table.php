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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('avatar')->nullable();
            $table->string('nickname')->nullable();
            $table->text('address')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('religion')->nullable();
            $table->string('person_status')->nullable();
            $table->string('stay_in')->nullable();
            $table->string('mother_name')->nullable();
            $table->text('family_name')->nullable();
            $table->text('family_address')->nullable();
            $table->string('gender')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('hobby')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('reference')->nullable();
            $table->string('reference_job')->nullable();
            $table->string('reference_relation')->nullable();
            $table->text('reference_address')->nullable();
            $table->string('card_ktp')->nullable();
            $table->string('card_family')->nullable();
            $table->string('family_number')->nullable();
            $table->string('card_ijazah')->nullable();
            $table->string('card_skck')->nullable();
            $table->string('active_date')->nullable();
            $table->string('card_certificate')->nullable();
            $table->string('card_sim')->nullable();
            $table->string('card_npwp')->nullable();
            $table->string('npwp_number')->nullable();
            $table->string('add_name_document_a')->nullable();
            $table->string('add_document_a')->nullable();
            $table->string('add_name_document_b')->nullable();
            $table->string('add_document_b')->nullable();
            $table->string('add_name_document_c')->nullable();
            $table->string('add_document_c')->nullable();
            $table->string('company_name_a')->nullable();
            $table->string('period_a')->nullable();
            $table->string('position_a')->nullable();
            $table->string('salary_a')->nullable();
            $table->string('company_name_b')->nullable();
            $table->string('period_b')->nullable();
            $table->string('position_b')->nullable();
            $table->string('salary_b')->nullable();
            $table->string('company_name_c')->nullable();
            $table->string('period_c')->nullable();
            $table->string('position_c')->nullable();
            $table->string('salary_c')->nullable();
            $table->string('company_name_d')->nullable();
            $table->string('period_d')->nullable();
            $table->string('position_d')->nullable();
            $table->string('salary_d')->nullable();
            $table->string('user_status')->nullable();
            $table->string('transfer')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('profiles');
    }
};
