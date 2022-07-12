<?php

use Illuminate\Database\Seeder;

class FieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields')->insert(
        [
            [
                'field_name' => 'integer',
                'field_text' => 'Number',
                'status' => 1
            ],
            [
                'field_name' => 'biginteger',
                'field_text' => 'Big Number',
                'status' => 1
            ],
            [
                'field_name' => 'float',
                'field_text' => 'Decimal Number',
                'status' => 1
            ],
            [
                'field_name' => 'boolean',
                'field_text' => 'Yes,No',
                'status' => 0
            ],
            [
                'field_name' => 'date',
                'field_text' => 'Date Picker',
                'status' => 1
            ],
            [
                'field_name' => 'datetime',
                'field_text' => 'DateTime Picker',
                'status' => 1
            ],
            [
                'field_name' => 'string',
                'field_text' => 'Text',
                'status' => 1
            ],
            [
                'field_name' => 'text',
                'field_text' => 'Text Editor (CK Editor)',
                'status' => 1
            ],
            [
                'field_name' => 'image',
                'field_text' => 'Image',
                'status' => 1
            ],
            [
                'field_name' => 'attachment',
                'field_text' => 'Attachment',
                'status' => 1
            ],
            [
                'field_name' => 'one_to_one_relation',
                'field_text' => 'One to One relation',
                'status' => 1
            ],
            [
                'field_name' => 'one_to_many_relation',
                'field_text' => 'One To Many Relation',
                'status' => 0
            ],
            [
                'field_name' => 'select',
                'field_text' => 'select',
                'status' => 1
            ],
            [
                'field_name' => 'radio',
                'field_text' => 'radio',
                'status' => 1
            ]
        ]
        );
    }
}
