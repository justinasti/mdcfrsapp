<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('userid');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role')->default(100);
            $table->integer('group')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->index('group', 'user_group_index');
            
            $table->foreign('group', 'user_group_foreign')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function(Blueprint $table) {
            $table->dropForeign('user_group_foreign');
            $table->dropIndex('user_group_index');
        });   
        Schema::dropIfExists('user');
    }
}
