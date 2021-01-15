<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableTipofechasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $tipofechas = [
            array('id' => '1','name' => 'Rango uno', 'created_at' => $now, 'updated_at' => $now),
			array('id' => '2','name' => 'Rango dos', 'created_at' => $now, 'updated_at' => $now),
			array('id' => '3','name' => 'Rango tres', 'created_at' => $now, 'updated_at' => $now)
        ];
        DB::table('tipofechas')->insert($tipofechas);
    }
}
