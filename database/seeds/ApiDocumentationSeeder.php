<?php

use Illuminate\Database\Seeder;

class ApiDocumentationSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('api_documentation')->insert([
            ['id' => '1', 'method_type' => '["POST"]', 'url' => 'api/login', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '2', 'method_type' => '["POST"]', 'url' => 'api/register', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '3', 'method_type' => '["GET","HEAD"]', 'url' => 'api/Invoicedetails/list', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '4', 'method_type' => '["POST"]', 'url' => 'api/Invoicedetails/create_or_update', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '5', 'method_type' => '["GET","HEAD"]', 'url' => 'api/Invoicedetails/edit/{id}', 'parameters' => '["{id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '6', 'method_type' => '["POST"]', 'url' => 'api/Invoicedetails/update/{id}', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '7', 'method_type' => '["DELETE"]', 'url' => 'api/Invoicedetails/delete/{id}', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '8', 'method_type' => '["DELETE"]', 'url' => 'api/Invoicedetails/delete_multiple', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '9', 'method_type' => '["GET","HEAD"]', 'url' => 'api/Invoices/list', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '10', 'method_type' => '["POST"]', 'url' => 'api/Invoices/create_or_update', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '11', 'method_type' => '["GET","HEAD"]', 'url' => 'api/Invoices/edit/{id}', 'parameters' => '["{id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '12', 'method_type' => '["POST"]', 'url' => 'api/Invoices/update/{id}', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '13', 'method_type' => '["DELETE"]', 'url' => 'api/Invoices/delete/{id}', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '14', 'method_type' => '["DELETE"]', 'url' => 'api/Invoices/delete_multiple', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '15', 'method_type' => '["GET","HEAD"]', 'url' => 'api/modules/{module_id}/Widgets', 'parameters' => '["{module_id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '16', 'method_type' => '["POST"]', 'url' => 'api/modules/Widgets/create_or_update', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '17', 'method_type' => '["GET","HEAD"]', 'url' => 'api/modules/Widgets/edit/{id}', 'parameters' => '["{id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '18', 'method_type' => '["POST"]', 'url' => 'api/modules/Widgets/update/{id}', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '19', 'method_type' => '["DELETE"]', 'url' => 'api/modules/Widgets/delete/{id}', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '20', 'method_type' => '["DELETE"]', 'url' => 'api/modules/Widgets/delete_multiple', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '21', 'method_type' => '["GET","HEAD"]', 'url' => 'api/users/getroles', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '22', 'method_type' => '["GET","HEAD"]', 'url' => 'api/roles/edit/{id}', 'parameters' => '["{id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '23', 'method_type' => '["POST"]', 'url' => 'api/roles/createorupdate', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '24', 'method_type' => '["GET","HEAD"]', 'url' => 'api/roles/delete/{id}', 'parameters' => '["{id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '25', 'method_type' => '["DELETE"]', 'url' => 'api/roles/deletemultiple', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '26', 'method_type' => '["GET","HEAD"]', 'url' => 'api/users/getpermissions', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '27', 'method_type' => '["GET","HEAD"]', 'url' => 'api/permissions/edit/{id}', 'parameters' => '["{id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '28', 'method_type' => '["POST"]', 'url' => 'api/permissions/createorupdate', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '29', 'method_type' => '["GET","HEAD"]', 'url' => 'api/permissions/delete/{id}', 'parameters' => '["{id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '30', 'method_type' => '["DELETE"]', 'url' => 'api/permissions/deletemultiple', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '31', 'method_type' => '["POST"]', 'url' => 'api/modulebuilder/saveMenuSorting', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '32', 'method_type' => '["POST"]', 'url' => 'api/modulebuilder/menuscreateorupdate', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '33', 'method_type' => '["GET","HEAD"]', 'url' => 'api/modulebuilder/menudelete/{id}', 'parameters' => '["{id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '34', 'method_type' => '["GET","HEAD"]', 'url' => 'api/modulebuilder/modulebuilderindex', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '35', 'method_type' => '["GET","HEAD"]', 'url' => 'api/modulebuilder/builder', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '36', 'method_type' => '["GET","HEAD"]', 'url' => 'api/modules', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '37', 'method_type' => '["GET","HEAD"]', 'url' => 'api/modules/list', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '38', 'method_type' => '["GET","HEAD"]', 'url' => 'api/modules/edit/{id}', 'parameters' => '["{id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '39', 'method_type' => '["GET","HEAD"]', 'url' => 'api/modules/delete/{id}', 'parameters' => '["{id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '40', 'method_type' => '["POST"]', 'url' => 'api/modules/CreateUpdate', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '41', 'method_type' => '["GET","HEAD"]', 'url' => 'api/modules/{id}', 'parameters' => '["{id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '42', 'method_type' => '["GET","HEAD"]', 'url' => 'api/modules/fields/{module_id}', 'parameters' => '["{module_id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '43', 'method_type' => '["POST"]', 'url' => 'api/modules/fields/CreateUpdate', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '44', 'method_type' => '["GET","HEAD"]', 'url' => 'api/modules/fields/delete/{id}', 'parameters' => '["{id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '45', 'method_type' => '["GET","HEAD"]', 'url' => 'api/modules/fields/edit/{id}', 'parameters' => '["{id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '46', 'method_type' => '["GET","HEAD"]', 'url' => 'api/modulebuilder/generateview', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '47', 'method_type' => '["GET","POST","HEAD"]', 'url' => 'api/modulebuilder/generate/{id}', 'parameters' => '["{id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '48', 'method_type' => '["GET","HEAD"]', 'url' => 'api/modulebuilder/deletemodule', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '49', 'method_type' => '["GET","HEAD"]', 'url' => 'api/modulebuilder/getTableNames', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '50', 'method_type' => '["DELETE"]', 'url' => 'api/modulebuilder/deletemultiplemodules', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '51', 'method_type' => '["DELETE"]', 'url' => 'api/modules/fields/multipledelete', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '52', 'method_type' => '["GET","HEAD"]', 'url' => 'api/users/list', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '53', 'method_type' => '["GET","HEAD"]', 'url' => 'api/users/edit/{id}', 'parameters' => '["{id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '54', 'method_type' => '["POST"]', 'url' => 'api/users/createorupdate', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '55', 'method_type' => '["GET","HEAD"]', 'url' => 'api/users/delete/{id}', 'parameters' => '["{id}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '56', 'method_type' => '["DELETE"]', 'url' => 'api/users/delete_multiple', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '57', 'method_type' => '["GET","HEAD"]', 'url' => 'api/users/profile', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '58', 'method_type' => '["POST"]', 'url' => 'api/users/profileUpdate', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '59', 'method_type' => '["GET","HEAD"]', 'url' => 'api/password/reset', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '60', 'method_type' => '["POST"]', 'url' => 'api/password/email', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '61', 'method_type' => '["GET","HEAD"]', 'url' => 'api/password/reset/{token}', 'parameters' => '["{token}"]', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03'],
            ['id' => '62', 'method_type' => '["POST"]', 'url' => 'api/password/reset', 'parameters' => '{}', 'description' => '', 'created_at' => '2020-10-18 10:47:03', 'updated_at' => '2020-10-18 10:47:03']
        ]);
    }
}
