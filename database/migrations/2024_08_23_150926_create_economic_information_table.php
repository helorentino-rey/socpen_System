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
        Schema::create('economic_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiary_id');
            $table->enum('receiving_pension', ['Yes', 'No']);
            $table->string('pension_amount', 10)->nullable();
            $table->string('pension_source', 30)->nullable();
            $table->enum('permanent_income', ['Yes', 'No']);
            $table->string('income_amount', 10)->nullable();
            $table->string('income_source', 30)->nullable();
            $table->enum('regular_support', ['Yes', 'No']);
            $table->string('support_amount', 10)->nullable();
            $table->string('support_source', 30)->nullable();
            $table->timestamps();

            $table->foreign('beneficiary_id')->references('id')->on('beneficiary')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('economic_information');
    }
};