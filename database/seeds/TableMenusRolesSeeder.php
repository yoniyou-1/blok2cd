<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableMenusRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $menusRoles = [
			  array('id' => '1','rol_id' => '1','menu_id' => '1','created_at' => $now,'updated_at' => $now),
			  array('id' => '2','rol_id' => '1','menu_id' => '2','created_at' => $now,'updated_at' => $now),
			  array('id' => '3','rol_id' => '1','menu_id' => '4','created_at' => $now,'updated_at' => $now),
			  array('id' => '4','rol_id' => '1','menu_id' => '5','created_at' => $now,'updated_at' => $now),
			  array('id' => '5','rol_id' => '1','menu_id' => '6','created_at' => $now,'updated_at' => $now)
        ];
        DB::table('menus_roles')->insert($menusRoles);  
    }
}
