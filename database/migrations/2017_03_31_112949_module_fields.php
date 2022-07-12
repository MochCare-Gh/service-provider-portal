<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModuleFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $table='module_fields';
    public function up()
    {
        Schema::create('module_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('field_name');
            $table->string('field_label');
            $table->integer('field_type');
            $table->integer('field_length')->default(0);
            $table->text('field_options');
            $table->string('related_table');
            $table->string('related_table_field');
            $table->string('related_table_field_display');
            $table->text('validation_rules');
            $table->tinyInteger('show_in_list');
            $table->integer('module_id');
            $table->timestamps();
            $table->timestamp('deleted_at')->default(\DB::raw('CURRENT_TIMESTAMP'));;
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('module_fields');
    }
}
