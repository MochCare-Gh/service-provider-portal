<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Healthfacility extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Healthfacility";
    public function up()
    {
        if ( Schema::hasTable("Healthfacility") ) {
            $this->down();
            Schema::create("Healthfacility", function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');$table->string('location');$table->integer('district');$table->integer('facility_type');$table->integer('category');$table->integer('rep');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Healthfacility", function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');$table->string('location');$table->integer('district');$table->integer('facility_type');$table->integer('category');$table->integer('rep');
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
        Schema::drop('Healthfacility');
    }
}
