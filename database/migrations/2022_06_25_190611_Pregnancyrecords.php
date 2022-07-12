<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pregnancyrecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Pregnancyrecords";
    public function up()
    {
        if ( Schema::hasTable("Pregnancyrecords") ) {
            $this->down();
            Schema::create("Pregnancyrecords", function (Blueprint $table) {
                $table->increments('id');
                $table->integer('rec_mo_reg_no');$table->integer('rec_no_of_pregnancies');$table->integer('rec_no_of_births');$table->integer('rec_no_of_abortions');$table->integer('rec_spontaneous');$table->integer('rec_induced');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Pregnancyrecords", function (Blueprint $table) {
                $table->increments('id');
                $table->integer('rec_mo_reg_no');$table->integer('rec_no_of_pregnancies');$table->integer('rec_no_of_births');$table->integer('rec_no_of_abortions');$table->integer('rec_spontaneous');$table->integer('rec_induced');
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
        Schema::drop('Pregnancyrecords');
    }
}
