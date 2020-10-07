<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $permisos = [
            array('id' => '1', 'name' => 'Listar documento', 'slug' => 'listar-documento', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'name' => 'Crear documento', 'slug' => 'crear-documento', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '3', 'name' => 'Editar documento', 'slug' => 'editar-documento', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '4', 'name' => 'Eliminar documento', 'slug' => 'eliminar-documento', 'created_at' => $now, 'updated_at' => $now)
        ];
        DB::table('permissions')->insert($permisos);
    }
}