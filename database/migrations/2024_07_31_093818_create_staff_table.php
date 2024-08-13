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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('lastname', 15);
            $table->string('firstname', 15);
            $table->string('middlename', 15)->nullable();
            $table->string('name_extension', 4)->nullable();
            $table->enum('sex', ['Male', 'Female']);
            $table->date('birthday');
            $table->integer('age', false, true)->length(3);
            $table->string('marital_status', 10);
            $table->string('contact_number', 11);
            $table->string('address', 50);
            $table->string('employee_id', 10)->unique();
            $table->string('email', 25)->unique();
            $table->string('password', 150);
            $table->string('assigned_province', 20);
            $table->string('profile_picture')->nullable();
            $table->enum('status', ['pending', 'active'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
