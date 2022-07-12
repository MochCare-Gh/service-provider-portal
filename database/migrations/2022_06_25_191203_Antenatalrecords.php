<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Antenatalrecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Antenatalrecords";
    public function up()
    {
        if ( Schema::hasTable("Antenatalrecords") ) {
            $this->down();
            Schema::create("Antenatalrecords", function (Blueprint $table) {
                $table->increments('id');
                $table->date('date');$table->string('weight');$table->string('bp');$table->string('urine');$table->string('gest_age');$table->string('fundal_heights');$table->string('presentation');$table->string('descent');$table->string('fetal_heart_rate');$table->string('ifa_supply_days');$table->string('complaints');$table->integer('staff');$table->integer('mo_reg_no');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Antenatalrecords", function (Blueprint $table) {
                $table->increments('id');
                $table->date('date');$table->string('weight');$table->string('bp');$table->string('urine');$table->string('gest_age');$table->string('fundal_heights');$table->string('presentation');$table->string('descent');$table->string('fetal_heart_rate');$table->string('ifa_supply_days');$table->string('complaints');$table->integer('staff');$table->integer('mo_reg_no');
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
        Schema::drop('Antenatalrecords');
    }
}
