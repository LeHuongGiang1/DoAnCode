<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('depot_id');
            $table->string('name');
            $table->string('configuration')->nullable();
            $table->string('image');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('category')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('depot_id')->references('id')->on('depot')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device');
    }
}
