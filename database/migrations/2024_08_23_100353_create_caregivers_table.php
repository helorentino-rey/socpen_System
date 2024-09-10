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
        Schema::create('caregivers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiary_id');
            $table->string('caregiver_last_name', 25)->nullable();
            $table->string('caregiver_first_name', 25)->nullable();
            $table->string('caregiver_middle_name', 25)->nullable();
            $table->string('caregiver_name_extension', 4)->nullable();
            $table->string('caregiver_relationship', 25)->nullable();
            $table->string('caregiver_contact', 13)->nullable();
            $table->timestamps();
    
            $table->foreign('beneficiary_id')->references('id')->on('beneficiary')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caregivers');
    }
};
