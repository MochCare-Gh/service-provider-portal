<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Immunizations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Immunizations";
    public function up()
    {
        if ( Schema::hasTable("Immunizations") ) {
            $this->down();
            Schema::create("Immunizations", function (Blueprint $table) {
                $table->increments('id');
                $table->string('ch_reg_no');$table->string('mo_reg_no');$table->string('age');$table->string('vaccine');$table->string('batch_no');$table->string('place_given');$table->integer('staff_id');$table->string('other_vaccine');$table->date('date');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Immunizations", function (Blueprint $table) {
                $table->increments('id');
                $table->string('ch_reg_no');$table->string('mo_reg_no');$table->string('age');$table->string('vaccine');$table->string('batch_no');$table->string('place_given');$table->integer('staff_id');$table->string('other_vaccine');$table->date('date');
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
        Schema::drop('Immunizations');
    }
}
