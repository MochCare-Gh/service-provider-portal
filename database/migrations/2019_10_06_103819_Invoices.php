<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Invoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public $table = "Invoices";
    public function up()
    {
        if ( Schema::hasTable("Invoices") ) {
            $this->down();
            Schema::create("Invoices", function (Blueprint $table) {
                $table->increments('id');
                $table->string('from_company_name');$table->text('from_company_address');$table->string('from_company_phone');$table->string('from_company_email');$table->string('to_company_name');$table->text('to_company_address');$table->string('to_company_phone');$table->string('to_company_email');$table->string('invoice_number');$table->date('payment_due');$table->float('tax');$table->float('shipping');$table->float('total');$table->string('payment_status');$table->string('invoice_type');$table->date('renewal_date');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        else{
            Schema::create("Invoices", function (Blueprint $table) {
                $table->increments('id');
                $table->string('from_company_name');$table->text('from_company_address');$table->string('from_company_phone');$table->string('from_company_email');$table->string('to_company_name');$table->text('to_company_address');$table->string('to_company_phone');$table->string('to_company_email');$table->string('invoice_number');$table->date('payment_due');$table->float('tax');$table->float('shipping');$table->float('total');$table->string('payment_status');$table->string('invoice_type');$table->date('renewal_date');
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
        Schema::drop('Invoices');
    }
}
