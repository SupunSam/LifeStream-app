<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            // Hospital Id
            $table->id();
            // Hospital Owner Id
            $table->integer('user_id');
            // Hospital Name
            $table->string('hsptl_name');
            // Hospital Cetegory
            $table->string('hsptl_category');
            // Hospital Address
            $table->string('hsptl_address');
            // Hospital City
            $table->string('hsptl_city');
            // Hospital Description
            $table->text('hsptl_desc')->nullable();
            // Hospital Website
            $table->string('hsptl_web')->nullable();
            // Hospital Logo
            $table->string('hsptl_logo')->nullable();
            // Hospital Cover
            $table->string('hsptl_cover')->nullable();
            // Record Modifier
            $table->integer('updated_by')->nullable();
            // Created and Updated Timestamps-2 fields
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospitals');
    }
}
