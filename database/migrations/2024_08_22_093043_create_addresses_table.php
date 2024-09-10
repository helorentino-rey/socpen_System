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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiary_id'); // Change to unsignedBigInteger
            $table->string('region', 50);
            $table->string('province', 50);
            $table->string('city', 50);
            $table->string('barangay', 50);
            $table->string('sitio', 50);
            $table->enum('type', ['permanent', 'present', 'spouse_address']);
            $table->timestamps();

            $table->foreign('beneficiary_id')->references('id')->on('beneficiary')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};