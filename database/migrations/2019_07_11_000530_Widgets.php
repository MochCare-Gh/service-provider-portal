<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Widgets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Widgets";
    public function up()
    {
        if ( Schema::hasTable("Widgets") ) {
            $this->down();
            Schema::create("Widgets", function (Blueprint $table) {
                $table->increments('id');
                $table->string('type');
                $table->string('icon');
                $table->string('title');
                $table->integer('module_id');
                $table->string('table');
                $table->string('tablefield');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Widgets", function (Blueprint $table) {
                $table->increments('id');
                $table->string('type');
                $table->string('icon');
                $table->string('title');
                $table->integer('module_id');
                $table->string('table');
                $table->string('tablefield');
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
        Schema::drop('Widgets');
    }
}
