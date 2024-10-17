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
        Schema::create('housing_living_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiary_id');
            $table->enum('house_status', ['Owned', 'Rent', 'Others']);
            $table->string('house_status_others_input', 25)->nullable();
            $table->enum('living_status', ['Living Alone', 'Living with spouse', 'Living with children', 'Others']);
            $table->string('living_status_others_input', 25)->nullable();
            $table->timestamps();

            $table->foreign('beneficiary_id')->references('id')->on('beneficiary')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('housing_living_status');
    }
};
