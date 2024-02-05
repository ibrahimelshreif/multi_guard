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
        Schema::create('locationclients', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('locationclients');
    }
};
