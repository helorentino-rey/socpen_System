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
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('name_extension')->nullable();
            $table->enum('sex', ['Male', 'Female']);
            $table->date('birthday');
            $table->integer('age');
            $table->string('marital_status');
            $table->string('contact_number');
            $table->string('address');
            $table->string('employee_id')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('assigned_province');
            $table->string('profile_photo_path')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
