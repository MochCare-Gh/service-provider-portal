<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Stafftypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Stafftypes";
    public function up()
    {
        if ( Schema::hasTable("Stafftypes") ) {
            $this->down();
            Schema::create("Stafftypes", function (Blueprint $table) {
                $table->increments('id');
                $table->string('type_name');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Stafftypes", function (Blueprint $table) {
                $table->increments('id');
                $table->string('type_name');
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
        Schema::drop('Stafftypes');
    }
}
