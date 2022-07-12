<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Category";
    public function up()
    {
        if ( Schema::hasTable("Category") ) {
            $this->down();
            Schema::create("Category", function (Blueprint $table) {
                $table->increments('id');
                $table->string('cat_name');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Category", function (Blueprint $table) {
                $table->increments('id');
                $table->string('cat_name');
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
        Schema::drop('Category');
    }
}
