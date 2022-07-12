<?php

use Illuminate\Database\Seeder;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call(FieldsSeeder::class);
       $this->call(RolesSeeder::class);
       $this->call(PermissionsSeeder::class);
       $this->call(PermissionRoleSeeder::class);
       $this->call(SettingsSeeder::class);
       //$this->call(RoleUserSeeder::class);
    }
}
