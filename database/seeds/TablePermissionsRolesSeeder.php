<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablePermissionsRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $permissionsRoles = [
        	array('id' => '1','rol_id' => '1','permission_id' => '1','created_at' => $now,'updated_at' => $now),
  			array('id' => '2','rol_id' => '1','permission_id' => '2','created_at' => $now,'updated_at' => $now),
  			array('id' => '3','rol_id' => '1','permission_id' => '3','created_at' => $now,'updated_at' => $now)
        ];
        DB::table('permissions_roles')->insert($permissionsRoles);  
    }
}
