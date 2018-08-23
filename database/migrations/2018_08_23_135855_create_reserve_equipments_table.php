<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReserveEquipmentsTable extends Migration
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
            $table->integer('reservation_id')->unsigned();
            $table->integer('equipment_id')->unsigned();
            $table->timestamps();

            $table->index('reservation_id', 'reserve_equipments_reservation_id_index');
            $table->index('equipment_id', 'reserve_equipments_equipment_id_index');

            $table->foreign('reservation_id', 'reserve_equipments_reservation_id_foreign')->references('id')->on('reservations');
            $table->foreign('equipment_id', 'reserve_equipments_equipment_id_foreign')->references('id')->on('equipments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reserve_equipments', function (Blueprint $table) {
            $table->dropForeign('reserve_equipments_reservation_id_foreign');
            $table->dropForeign('reserve_equipments_equipment_id_foreign');

            $table->dropIndex('reserve_equipments_reservation_id_index');
            $table->dropIndex('reserve_equipments_equipment_id_index');
        });
        Schema::dropIfExists('reserve_equipments');
    }
}
