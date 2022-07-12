<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Childgrowth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Childgrowth";
    public function up()
    {
        if ( Schema::hasTable("Childgrowth") ) {
            $this->down();
            Schema::create("Childgrowth", function (Blueprint $table) {
                $table->increments('id');
                $table->date('date');$table->string('weight');$table->string('age');$table->string('length');$table->string('complaints');$table->integer('staff_id');$table->string('ch_reg_no');$table->integer('mo_reg_no');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Childgrowth", function (Blueprint $table) {
                $table->increments('id');
                $table->date('date');$table->string('weight');$table->string('age');$table->string('length');$table->string('complaints');$table->integer('staff_id');$table->string('ch_reg_no');$table->integer('mo_reg_no');
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
        Schema::drop('Childgrowth');
    }
}
