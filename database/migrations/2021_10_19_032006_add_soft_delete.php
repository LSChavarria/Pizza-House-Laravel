<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('sucursals', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('promocions', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('pizzas', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('ordens', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('mensaje_clientes', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
