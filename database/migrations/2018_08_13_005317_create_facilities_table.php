<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('description', 191);
            $table->integer('capacity');
            $table->integer('managed_by')->unsigned();
            $table->timestamps();

            $table->index('managed_by', 'facilities_managed_by_index');

            $table->foreign('managed_by', 'facilities_managed_by_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facilities', function(Blueprint $table) {
            $table->dropForeign('facilities_managed_by_foreign');
            $table->dropIndex('facilities_managed_by_index');
        });

        Schema::dropIfExists('facilities');
    }
}
