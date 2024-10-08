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
        Schema::create('beneficiary', function (Blueprint $table) {
            $table->id();
            $table->string('osca_id')->unique();
            $table->integer('ncsc_rrn')->nullable();
            $table->string('profile_upload');
            $table->enum('status', [
                'ACTIVE',
                'WAITLISTED',
                'SUSPENDED',
                'UNVALIDATED',
                'NOT LOCATED',
                'DOUBLE ENTRY',
                'TRANSFER OF RESIDENCE',
                'RECEIVING SUPPORT FROM THE FAMILY',
                'RECEIVING PENSION FROM OTHER AGENCY',
                'WITH PERMANENT INCOME'
            ])->default('UNVALIDATED');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiary');
    }
};