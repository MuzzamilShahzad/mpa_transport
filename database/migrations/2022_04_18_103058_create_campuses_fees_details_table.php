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
        Schema::create('campuses_fees_details', function (Blueprint $table) {
            
            $table->increments('id');

            $table->unsignedInteger('campus_id');
            $table->foreign('campus_id')->references('id')->on('campuses');
            
            $table->unsignedInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes');

            $table->unsignedInteger('session_id');
            $table->foreign('session_id')->references('id')->on('sessions');
           
            $table->unsignedInteger('fees_type_id');
            $table->foreign('fees_type_id')->references('id')->on('fees_types');
            
            $table->integer('fees_amount');
            $table->date('due_date');
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
        Schema::dropIfExists('campuses_fees_details');
    }
};
