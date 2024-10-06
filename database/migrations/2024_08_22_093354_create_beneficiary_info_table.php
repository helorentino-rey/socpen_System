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
        Schema::create('beneficiary_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiary_id'); 
            $table->string('last_name', 20);
            $table->string('first_name', 25);
            $table->string('middle_name', 20)->nullable();
            $table->string('name_extension', 4)->nullable();
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('beneficiary_id')->references('id')->on('beneficiary')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beneficiary_info');
    }
};
