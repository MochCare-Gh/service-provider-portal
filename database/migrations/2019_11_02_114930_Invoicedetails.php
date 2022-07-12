<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Invoicedetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Invoicedetails";
    public function up()
    {
        if ( Schema::hasTable("Invoicedetails") ) {
            $this->down();
            Schema::create("Invoicedetails", function (Blueprint $table) {
                $table->increments('id');
                $table->integer('quantity');$table->string('product');$table->text('description');$table->float('subtotal');$table->integer('invoice_id');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Invoicedetails", function (Blueprint $table) {
                $table->increments('id');
                $table->integer('quantity');$table->string('product');$table->text('description');$table->float('subtotal');$table->integer('invoice_id');
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
        Schema::drop('Invoicedetails');
    }
}
