<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Postnatalrecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Postnatalrecords";
    public function up()
    {
        if ( Schema::hasTable("Postnatalrecords") ) {
            $this->down();
            Schema::create("Postnatalrecords", function (Blueprint $table) {
                $table->increments('id');
                $table->date('date');$table->string('weight');$table->string('bp');$table->string('urine');$table->string('pulse');$table->string('fundal_height');$table->string('temperature');$table->string('lochia_colour');$table->string('breast_condition');$table->string('ifa_supplied_days');$table->string('complaints');$table->integer('staff_id');$table->string('incision_perineum');$table->string('mood_changes');$table->integer('mo_reg_no');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Postnatalrecords", function (Blueprint $table) {
                $table->increments('id');
                $table->date('date');$table->string('weight');$table->string('bp');$table->string('urine');$table->string('pulse');$table->string('fundal_height');$table->string('temperature');$table->string('lochia_colour');$table->string('breast_condition');$table->string('ifa_supplied_days');$table->string('complaints');$table->integer('staff_id');$table->string('incision_perineum');$table->string('mood_changes');$table->integer('mo_reg_no');
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
        Schema::drop('Postnatalrecords');
    }
}
