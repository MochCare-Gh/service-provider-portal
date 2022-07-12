<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Blog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Blog";
    public function up()
    {
        if ( Schema::hasTable("Blog") ) {
            $this->down();
            Schema::create("Blog", function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->text('content');
                $table->string('meta_tags');
                $table->text('meta_description');
                $table->string('slug');
                $table->text('excerpt');
                $table->integer('category');
                $table->string('tags');
                $table->string('author_name');
                $table->integer('status');
                $table->string('image');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Blog", function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->text('content');
                $table->string('meta_tags');
                $table->text('meta_description');
                $table->string('slug');
                $table->text('excerpt');
                $table->integer('category');
                $table->string('tags');
                $table->string('author_name');
                $table->integer('status');
                $table->string('image');
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
        Schema::drop('Blog');
    }
}
