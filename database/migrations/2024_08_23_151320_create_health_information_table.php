<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('health_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiary_id');
            $table->enum('existing_illness', ['Yes', 'None']);
            $table->string('illness_specify', 30)->nullable();
            $table->enum('with_disability', ['Yes', 'None']);
            $table->string('disability_specify', 30)->nullable();
            $table->enum('difficult_adl', ['Yes', 'No']);
            $table->enum('dependent_iadl', ['Yes', 'No']);
            $table->enum('experience_loss', ['Yes', 'No']);
            $table->timestamps();

            $table->foreign('beneficiary_id')->references('id')->on('beneficiary')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('health_information');
    }
};
