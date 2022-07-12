<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('registration', 255);
            $table->string('crudbuilder', 255);
            $table->string('filemanager', 255);
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
        if (Schema::hasTable('Settings')) {
            Schema::drop('Settings');
        }
    }
}
