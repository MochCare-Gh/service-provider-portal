<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Blog_categories";
    public function up()
    {
        if ( Schema::hasTable("Blog_categories") ) {
            $this->down();
            Schema::create("Blog_categories", function (Blueprint $table) {
                $table->increments('id');
                $table->string('category_name');
                $table->integer('status');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Blog_categories", function (Blueprint $table) {
                $table->increments('id');
                $table->string('category_name');
                $table->integer('status');
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
        Schema::drop('Blog_categories');
    }
}
