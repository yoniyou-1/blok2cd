<?php

use Illuminate\Database\Seeder;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'user' => 'administrador',
            'name' => 'JohnnyAdmin',
            'password' => bcrypt('admin1234')
        ]);

        DB::table('usuarios')->insert([
            'user' => 'especialista',
            'name' => 'JohnnyEspecialista',
            'password' => bcrypt('espe1234')
        ]);

        DB::table('usuarios_roles')->insert([
            'rol_id' => 1,
            'usuario_id' => 1,
            'state' => 1
        ]);

        DB::table('usuarios_roles')->insert([
            'rol_id' => 2,
            'usuario_id' => 2,
            'state' => 1
        ]);
    }
}