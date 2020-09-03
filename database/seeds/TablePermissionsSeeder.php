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
            array('id' => '1', 'name' => 'Crear doumento', 'slug' => 'crear-doumento', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '2', 'name' => 'editar doumento', 'slug' => 'editar-doumento', 'created_at' => $now, 'updated_at' => $now),
            array('id' => '3', 'name' => 'eliminar doumento', 'slug' => 'eliminar-doumento', 'created_at' => $now, 'updated_at' => $now)
        ];
        DB::table('permissions')->insert($permisos);
    }
}