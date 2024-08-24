<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiary_id');
            $table->string('children_name', 50);
            $table->enum('children_civil_status', ['Single', 'Married', 'Widowed', 'Separated']);
            $table->string('children_occupation', 50);
            $table->string('children_income', 10);
            $table->string('children_contact_number', 13);
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
        Schema::dropIfExists('children');
    }
}