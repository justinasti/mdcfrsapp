<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->string('activity');
            $table->integer('facility_id')->unsigned();
            $table->integer('requested_by')->unsigned();
            $table->integer('noted_by')->unsigned();
            $table->integer('approved_by')->unsigned();
            $table->timestamps();

            $table->index('facility_id', 'reservations_facility_id_index');
            $table->index('requested_by', 'reservations_requested_by_index');
            $table->index('noted_by', 'reservations_noted_by_index');
            $table->index('approved_by', 'reservation_approved_by_index');

            $table->foreign('facility_id', 'reservations_facility_id_foreign')->references('id')->on('facilities');
            $table->foreign('requested_by', 'reservations_requested_by_foreign')->references('id')->on('users');
            $table->foreign('noted_by', 'reservations_noted_by_foreign')->references('id')->on('users');
            $table->foreign('approved_by', 'reservations_approved_by_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function(Blueprint $table) {
            $table->dropForeign('reservations_facility_id_foreign');
            $table->dropForeign('reservations_requested_by_foreign');
            $table->dropForeign('reservations_noted_by_foreign');
            $table->dropForeign('reservations_approved_by_foreign');

            $table->dropIndex('reservations_facility_id_index');
            $table->dropIndex('reservations_requested_by_index');
            $table->dropIndex('reservations_noted_by_index');
            $table->dropIndex('reservations_approved_by_index');
        });
        Schema::dropIfExists('reservations');
    }
}
