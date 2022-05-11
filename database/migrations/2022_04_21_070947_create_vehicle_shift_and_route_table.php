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
        Schema::create('vehicle_shift_and_route', function (Blueprint $table) {
            
            $table->increments('id');

            $table->unsignedInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            
            $table->unsignedInteger('shift_id');
            $table->foreign('shift_id')->references('id')->on('shifts');
            
            $table->unsignedInteger('route_id');
            $table->foreign('route_id')->references('id')->on('routes');
            
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_delete')->default(0);
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
        Schema::dropIfExists('vehicle_shift_and_route');
    }
};
