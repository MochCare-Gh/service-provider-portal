<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Facility extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Facility";
    public function up()
    {
        if ( Schema::hasTable("Facility") ) {
            $this->down();
            Schema::create("Facility", function (Blueprint $table) {
                $table->increments('id');
                $table->string('fac_name');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Facility", function (Blueprint $table) {
                $table->increments('id');
                $table->string('fac_name');
                $table->timestamps();
                $table->softDeletes();
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
        Schema::drop('Facility');
    }
}
