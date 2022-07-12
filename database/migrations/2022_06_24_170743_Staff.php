<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Staff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Staff";
    public function up()
    {
        if ( Schema::hasTable("Staff") ) {
            $this->down();
            Schema::create("Staff", function (Blueprint $table) {
                $table->increments('id');
                $table->string('staff_id');$table->string('staff_name');$table->integer('staff_designation');$table->string('staff_tel');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Staff", function (Blueprint $table) {
                $table->increments('id');
                $table->string('staff_id');$table->string('staff_name');$table->integer('staff_designation');$table->string('staff_tel');
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
        Schema::drop('Staff');
    }
}
