<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('roles')->insert(
         [
            [
                'name' => 'Super-Admin',
                'display_name' => 'Super Admin',
                'description' => 'Super Admin'
            ],
            [
                'name' => 'Admin',
                'display_name' => 'Admin Role',
                'description' => 'This is Admin Role'
            ]
         ]
        );
    }
}
