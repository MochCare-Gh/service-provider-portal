<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('permissions')->insert([
            [
                'name' => 'modulebuilder_menu',
                'display_name' => 'CRUD / Menu',
                'description' => 'Display Menu of Module Builder'
            ],
            [
                'name' => 'modulebuilder_modules',
                'display_name' => 'CRUD / Modules',
                'description' => 'Display All Modules of Module Builder'
            ],
            // New permissions
            //users
            [
                'name' => 'user_all',
                'display_name' => 'Users List',
                'description' => 'Display Users List'
            ],
            [
                'name' => 'user_edit',
                'display_name' => 'Edit user data',
                'description' => 'View user data to edit it'
            ],
            [
                'name' => 'user_create_update',
                'display_name' => 'Create User/Update User',
                'description' => 'Create User/Update User'
            ],
            [
                'name' => 'user_delete',
                'display_name' => 'Delete user',
                'description' => 'Delete user'
            ],
            [
                'name' => 'user_delete_muliple',
                'display_name' => 'Delete Multiple user',
                'description' => 'Delete Multiple user'
            ],
            [
                'name' => 'user_profile',
                'display_name' => 'User profile view',
                'description' => 'User profile view'
            ],
            [
                'name' => 'user_profile_update',
                'display_name' => 'Update user profile',
                'description' => 'Update user profile'
            ],
            //File manager
            [
                'name' => 'filemanager',
                'display_name' => 'File Manager',
                'description' => 'File Manager'
            ],
            //roles
            [
                'name' => 'roles_all',
                'display_name' => 'Roles List',
                'description' => 'Roles List'
            ],
            [
                'name' => 'roles_edit',
                'display_name' => 'Role Edit',
                'description' => 'Role Edit'
            ],
            [
                'name' => 'roles_create_update',
                'display_name' => 'Create Role /Update Role',
                'description' => 'Create Role /Update Role'
            ],
            [
                'name' => 'roles_delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Roles'
            ],
            [
                'name' => 'roles_delete_multiple',
                'display_name' => 'Delete Multiple Roles',
                'description' => 'Delete Multiple Roles'
            ],
            //permisssions
            [
                'name' => 'permissions_all',
                'display_name' => 'Permissions List',
                'description' => 'Permissions List'
            ],
            [
                'name' => 'permissions_edit',
                'display_name' => 'Permissions Edit',
                'description' => 'Permissions Edit'
            ],
            [
                'name' => 'permissions_create_update',
                'display_name' => 'Create Permission /Update Permission',
                'description' => 'Create Permission /Update Permission'
            ],
            [
                'name' => 'permissions_delete',
                'display_name' => 'Delete Permission',
                'description' => 'Delete Permission'
            ],
            [
                'name' => 'permissions_delete_multiple',
                'display_name' => 'Delete Multiple Permission',
                'description' => 'Delete Multiple Permission'
            ],
            //general-settings
            [
                'name' => 'general_settings_all',
                'display_name' => 'General settings list',
                'description' => 'General settings list'
            ],
            [
                'name' => 'general_settings_create_update',
                'display_name' => 'Update general settings',
                'description' => 'Update general settings'
            ],
            [
                'name' => 'translation-manager',
                'display_name' => 'Translation Manager',
                'description' => 'Display Translation Manager'
            ],
            [
                'name' => 'Widgets',
                'display_name' => 'Widgets Manager',
                'description' => 'Display Widgets Manager'
            ],
            [
                'name' => 'Invoices',
                'display_name' => 'Invoices Module',
                'description' => 'Invoices Module'
            ],
            [
                'name' => 'Blog',
                'display_name' => 'Blog Module',
                'description' => 'Blog Module'
            ],
            [
                'name' => 'Blog_categories',
                'display_name' => 'Blog Categories',
                'description' => 'Blog Categories'
            ],
        ]);
    }

}
