<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesForUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('roles_for_user')) {
            Schema::create('roles_for_user', function (Blueprint $table) {
                $table->id();
                
                $table->unsignedBigInteger('id_user');
                $table->unsignedBigInteger('id_role');
                $table->timestamps();

                $table->foreign('id_role')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_for_user');
    }
}
