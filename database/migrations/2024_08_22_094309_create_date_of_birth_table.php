<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('date_of_birth', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiary_id');
            $table->string('mother_last_name', 25);
            $table->string('mother_first_name', 25);
            $table->string('mother_middle_name', 25)->nullable();
            $table->date('date_of_birth');
            $table->string('place_of_birth_city', 25);
            $table->string('place_of_birth_province', 25);
            $table->integer('age');
            $table->enum('sex', ['Male', 'Female']);
            $table->enum('civil_status', ['Single', 'Married', 'Widowed', 'Separated']);
            $table->timestamps();;

            $table->foreign('beneficiary_id')->references('id')->on('beneficiary')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('date_of_birth');
    }
};
