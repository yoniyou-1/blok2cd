<?php


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TableTipodocsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $tipodocs = [
            array('id' => '1', 'name' => 'Cert Core', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'name' => 'Cert Intel', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '3', 'name' => 'Consulta', 'created_at' => $now, 'updated_at' => $now)
        ];
        DB::table('tipodocs')->insert($tipodocs);
    }
}
