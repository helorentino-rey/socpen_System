<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spouses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiary_id');
            $table->string('spouse_last_name', 20)->nullable();
            $table->string('spouse_first_name', 20)->nullable();
            $table->string('spouse_middle_name', 20)->nullable();
            $table->string('spouse_name_extension', 4)->nullable();
            $table->string('spouse_contact', 13)->nullable();
            $table->timestamps();

            $table->foreign('beneficiary_id')->references('id')->on('beneficiary')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spouses');
    }
}