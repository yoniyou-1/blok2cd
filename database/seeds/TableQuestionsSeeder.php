<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $questions = [
            array('id' => '1', 'name' => 'Los documentos adjuntos, se encuentra cargado en el Sisconsola', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'name' => 'El documento Pase a Produccion, se encuentra correctamente lleno', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '3', 'name' => 'El documento Analisis de Impacto, se encuentra correctamente lleno ', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '4', 'name' => 'La aplicacion cierra automaticamente', 'created_at' => $now, 'updated_at' => $now)
        ];
        DB::table('questions')->insert($questions);
    }
}
