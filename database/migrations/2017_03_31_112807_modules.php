<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Modules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $table='modules';
    public function up()
    {
       Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('module_name');
            $table->string('module_icon');
            $table->string('module_table_name')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->timestamp('deleted_at')->default(\DB::raw('CURRENT_TIMESTAMP'));;
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('modules');
    }
}
