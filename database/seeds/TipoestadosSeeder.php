<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoestadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $tipoestados = [
            array('id' => '1', 'name' => 'Finalizado', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'name' => 'En Proceso', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '3', 'name' => 'Cancelado', 'created_at' => $now, 'updated_at' => $now)
            
        ];
        DB::table('tipoestados')->insert($tipoestados);
    }
}
