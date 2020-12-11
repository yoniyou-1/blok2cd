<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposolicitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $tiposolicitudes = [
            array('id' => '1', 'name' => 'Solicitud', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'name' => 'Requerimiento', 'created_at' => $now, 'updated_at' => $now)
            
        ];
        DB::table('tiposolicitudes')->insert($tiposolicitudes);
    }
}
