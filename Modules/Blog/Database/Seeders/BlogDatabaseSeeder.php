<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BlogDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('menus')->insert(
         [
            ['id' => '1','name' => 'Blog_categories','permission_name' => 'Blog_categories','url' => 'Blog_categoriesIndex','icon' => 'fa-file-text','type' => 'module','parent' => '3','hierarchy' => '1','module_id' => '2','created_at' => '2021-01-22 11:28:40','updated_at' => '2021-02-08 10:59:16'],
            ['id' => '2','name' => 'Blog','permission_name' => 'Blog','url' => 'BlogIndex','icon' => 'fa-book','type' => 'module','parent' => '3','hierarchy' => '2','module_id' => '1','created_at' => '2021-01-28 11:14:00','updated_at' => '2021-02-08 10:59:16'],
            ['id' => '3','name' => 'Blog','permission_name' => NULL,'url' => '#','icon' => 'fa-book','type' => 'menuItem','parent' => '0','hierarchy' => '1','module_id' => '0','created_at' => '2021-02-08 10:59:01','updated_at' => '2021-02-08 10:59:16']
         ]
        );
    }
}
