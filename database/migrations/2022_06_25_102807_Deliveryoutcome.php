<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Deliveryoutcome extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Deliveryoutcome";
    public function up()
    {
        if ( Schema::hasTable("Deliveryoutcome") ) {
            $this->down();
            Schema::create("Deliveryoutcome", function (Blueprint $table) {
                $table->increments('id');
                $table->date('date');$table->string('pregnancy_weeks');$table->string('delivery_time');$table->string('placenta_delivery');$table->string('labour_in_delivery_duration');$table->string('delivery_type');$table->string('vacuum_indication');$table->string('anesthesia');$table->string('est_blood_loss');$table->string('blood_transfusion');$table->string('placenta_state');$table->string('perineum_state');$table->string('delivery_complications');$table->string('birth_attendant');$table->integer('place_of_delivery');$table->string('brestfeeding_30min');$table->string('infant_skin_to_skin');$table->string('mothers_condition');$table->string('bp');$table->string('pulse');$table->string('temperature');$table->string('uterus_condition');$table->string('incision_perineum');$table->string('breast_condition');$table->string('fundal_height');$table->string('lochia_colour');$table->string('lochia_odour');$table->string('ifa_supply_days');$table->string('pnc_type_1');$table->string('delivery_outcome');$table->string('number_of_babies');$table->string('baby_sex');$table->string('weight');$table->string('length');$table->string('circumference');$table->string('apgar_score');$table->string('resuscitation');$table->string('congenital_malformation');$table->string('complications');$table->string('diagnosis');$table->string('referred_to');$table->string('heart_rate');$table->string('respiratory_rate');$table->string('brestfeeding');$table->string('baby_suckling');$table->string('meconium_passed');$table->string('urine_passed');$table->string('tetracycle_for_eyecare');$table->string('cord_care');$table->string('baby_condition_discharge');$table->integer('mo_reg_no');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Deliveryoutcome", function (Blueprint $table) {
                $table->increments('id');
                $table->date('date');$table->string('pregnancy_weeks');$table->string('delivery_time');$table->string('placenta_delivery');$table->string('labour_in_delivery_duration');$table->string('delivery_type');$table->string('vacuum_indication');$table->string('anesthesia');$table->string('est_blood_loss');$table->string('blood_transfusion');$table->string('placenta_state');$table->string('perineum_state');$table->string('delivery_complications');$table->string('birth_attendant');$table->integer('place_of_delivery');$table->string('brestfeeding_30min');$table->string('infant_skin_to_skin');$table->string('mothers_condition');$table->string('bp');$table->string('pulse');$table->string('temperature');$table->string('uterus_condition');$table->string('incision_perineum');$table->string('breast_condition');$table->string('fundal_height');$table->string('lochia_colour');$table->string('lochia_odour');$table->string('ifa_supply_days');$table->string('pnc_type_1');$table->string('delivery_outcome');$table->string('number_of_babies');$table->string('baby_sex');$table->string('weight');$table->string('length');$table->string('circumference');$table->string('apgar_score');$table->string('resuscitation');$table->string('congenital_malformation');$table->string('complications');$table->string('diagnosis');$table->string('referred_to');$table->string('heart_rate');$table->string('respiratory_rate');$table->string('brestfeeding');$table->string('baby_suckling');$table->string('meconium_passed');$table->string('urine_passed');$table->string('tetracycle_for_eyecare');$table->string('cord_care');$table->string('baby_condition_discharge');$table->integer('mo_reg_no');
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
        Schema::drop('Deliveryoutcome');
    }
}
