<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_vendors', function (Blueprint $table) {
            
			$table->id();
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('vendor_id')->references('id')->on('vendors');
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
        Schema::dropIfExists('location_vendors');
    }
};
