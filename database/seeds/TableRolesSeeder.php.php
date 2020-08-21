<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $rols = [
            array('id' => '1', 'name' => 'administrador', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'name' => 'especialista', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '3', 'name' => 'supervisor', 'created_at' => $now, 'updated_at' => $now)
        ];
        DB::table('roles')->insert($rols);
    }
}