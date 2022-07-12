<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mothers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Mothers";
    public function up()
    {
        if ( Schema::hasTable("Mothers") ) {
            $this->down();
            Schema::create("Mothers", function (Blueprint $table) {
                $table->increments('id');
                $table->string('mo_serial_no');$table->string('mo_reg_no');$table->string('mo_nhis_no');$table->string('mo_fullname');$table->date('mo_dob');$table->string('mo_age');$table->string('mo_address');$table->integer('mo_district');$table->string('mo_landmark');$table->string('mo_marital_status');$table->string('mo_contact_1');$table->string('mo_contact_2');$table->string('mo_education_status');$table->string('mo_occupation');$table->string('mo_profession');$table->string('mo_spouse_name');$table->string('mo_spouse_contact');$table->string('mo_spouse_address');$table->string('mo_spouse_occupation');$table->string('mo_emergency_person');$table->string('mo_emergency_contact');$table->integer('staff');$table->date('mo_reg_date');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Mothers", function (Blueprint $table) {
                $table->increments('id');
                $table->string('mo_serial_no');$table->string('mo_reg_no');$table->string('mo_nhis_no');$table->string('mo_fullname');$table->date('mo_dob');$table->string('mo_age');$table->string('mo_address');$table->integer('mo_district');$table->string('mo_landmark');$table->string('mo_marital_status');$table->string('mo_contact_1');$table->string('mo_contact_2');$table->string('mo_education_status');$table->string('mo_occupation');$table->string('mo_profession');$table->string('mo_spouse_name');$table->string('mo_spouse_contact');$table->string('mo_spouse_address');$table->string('mo_spouse_occupation');$table->string('mo_emergency_person');$table->string('mo_emergency_contact');$table->integer('staff');$table->date('mo_reg_date');
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
        Schema::drop('Mothers');
    }
}
