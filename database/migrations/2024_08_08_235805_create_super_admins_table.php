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
        Schema::create('super_admins', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id', 8)->unique();
            $table->string('password', 8);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('super_admins');
    }
};
