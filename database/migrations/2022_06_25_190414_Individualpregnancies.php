<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Individualpregnancies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Individualpregnancies";
    public function up()
    {
        if ( Schema::hasTable("Individualpregnancies") ) {
            $this->down();
            Schema::create("Individualpregnancies", function (Blueprint $table) {
                $table->increments('id');
                $table->string('birth_no');$table->date('birth_date');$table->string('place_of_birth');$table->string('mode_of_delivery');$table->string('outcome_of_delivery');$table->string('sex');$table->string('child_present_condition');$table->string('major_risk_factors');$table->string('pregnancy_problems');$table->string('gestational_age');$table->string('birth_weight');$table->string('labour_complications');$table->integer('birth_mother_reg_no');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Individualpregnancies", function (Blueprint $table) {
                $table->increments('id');
                $table->string('birth_no');$table->date('birth_date');$table->string('place_of_birth');$table->string('mode_of_delivery');$table->string('outcome_of_delivery');$table->string('sex');$table->string('child_present_condition');$table->string('major_risk_factors');$table->string('pregnancy_problems');$table->string('gestational_age');$table->string('birth_weight');$table->string('labour_complications');$table->integer('birth_mother_reg_no');
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
        Schema::drop('Individualpregnancies');
    }
}
