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
        Schema::create('student_vehicle', function (Blueprint $table) {
            
            $table->increments('id');

            $table->unsignedInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('drivers');

            $table->unsignedInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');

            $table->unsignedInteger('shift_id');
            $table->foreign('shift_id')->references('id')->on('shifts');

            $table->unsignedInteger('route_id');
            $table->foreign('route_id')->references('id')->on('routes');

            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            
            $table->date('joining_date');
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
        Schema::dropIfExists('student_vehicle');
    }
};
