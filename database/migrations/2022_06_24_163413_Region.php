<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Region extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Region";
    public function up()
    {
        if ( Schema::hasTable("Region") ) {
            $this->down();
            Schema::create("Region", function (Blueprint $table) {
                $table->increments('id');
                $table->string('reg_name');$table->string('reg_code');$table->integer('reg_personnel');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Region", function (Blueprint $table) {
                $table->increments('id');
                $table->string('reg_name');$table->string('reg_code');$table->integer('reg_personnel');
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
        Schema::drop('Region');
    }
}
