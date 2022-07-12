<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Personnels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Personnels";
    public function up()
    {
        if ( Schema::hasTable("Personnels") ) {
            $this->down();
            Schema::create("Personnels", function (Blueprint $table) {
                $table->increments('id');
                $table->string('per_name');$table->string('per_contact');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Personnels", function (Blueprint $table) {
                $table->increments('id');
                $table->string('per_name');$table->string('per_contact');
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
        Schema::drop('Personnels');
    }
}
