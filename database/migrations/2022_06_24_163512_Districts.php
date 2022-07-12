<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Districts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Districts";
    public function up()
    {
        if ( Schema::hasTable("Districts") ) {
            $this->down();
            Schema::create("Districts", function (Blueprint $table) {
                $table->increments('id');
                $table->string('dist_name');$table->string('dist_code');$table->integer('dist_personnel');$table->integer('dist_region');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Districts", function (Blueprint $table) {
                $table->increments('id');
                $table->string('dist_name');$table->string('dist_code');$table->integer('dist_personnel');$table->integer('dist_region');
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
        Schema::drop('Districts');
    }
}
