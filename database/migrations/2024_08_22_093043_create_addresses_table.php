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
            $table->string('region', 20);
            $table->string('province', 20);
            $table->string('city', 20);
            $table->string('barangay', 20);
            $table->string('sitio', 30);
            $table->enum('type', ['permanent', 'present']);
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