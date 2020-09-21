<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $now = Carbon::now()->toDateTimeString();
        DB::table('usuarios')->insert([
            'user' => 'administrador',
            'dni' => '20147042',
            'name' => 'JohnnyAdmin',
            'lastname' => 'Delgado',
            'password' => bcrypt('admin1234'),
            'created_at' => $now,
            'updated_at' => $now
        ]);

        DB::table('usuarios')->insert([
            'user' => 'especialista',
            'dni' => '20147043',
            'name' => 'JohnnyEspecialista',
            'lastname' => 'DelgadoE',
            'password' => bcrypt('espe1234'),
            'created_at' => $now,
            'updated_at' => $now
        ]);

        DB::table('usuarios_roles')->insert([
            'rol_id' => 1,
            'usuario_id' => 1,
            'state' => 1,
            'created_at' => $now,
            'updated_at' => $now
        ]);

        DB::table('usuarios_roles')->insert([
            'rol_id' => 2,
            'usuario_id' => 2,
            'state' => 1,
            'created_at' => $now,
            'updated_at' => $now
        ]);
    }
}