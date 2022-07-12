<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(FieldsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(PermissionRoleSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(Translationseeder::class);
        $this->call(ApiDocumentationSeeder::class);
        $this->call(\Modules\Blog\Database\Seeders\BlogDatabaseSeeder::class);
        //$this->call(RoleUserSeeder::class);
    }

}
