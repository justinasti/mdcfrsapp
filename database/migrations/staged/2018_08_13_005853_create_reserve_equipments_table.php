<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReserveEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserve_equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('reservation_id');
            $table->increments('equipment_id');
            $table->timestamps();

            $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->foreign('equipment_id')->references('id')->on('equipments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserve_equipments');
    }
}
