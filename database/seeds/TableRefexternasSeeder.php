<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableRefexternasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $refexternas = [
            array('id' => '1','name' => 'Certificador1', 'created_at' => $now, 'updated_at' => $now),
  			array('id' => '2','name' => 'Certificador2', 'created_at' => $now, 'updated_at' => $now),
  			array('id' => '3','name' => 'Certificador3', 'created_at' => $now, 'updated_at' => $now),
  			array('id' => '4','name' => 'Gerencia1', 'created_at' => $now, 'updated_at' => $now)
        ];
        DB::table('refexternas')->insert($refexternas);
    }
}
