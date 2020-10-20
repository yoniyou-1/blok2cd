<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
            $this->truncateTablas([
            'roles',
            'permissions',
            'usuarios',
            'usuarios_roles',
            'menus',
            'menus_roles',
            'permissions_roles',
            'tipodocs'
        ]);
        // $this->call(UsersTableSeeder::class);
        $this->call(TableRolesSeeder::class);
        $this->call(TablePermissionsSeeder::class);
        $this->call(UsuarioAdministradorSeeder::class);
        $this->call(TableMenusSeeder::class);
        $this->call(TableMenusRolesSeeder::class);
        $this->call(TablePermissionsRolesSeeder::class);
        $this->call(TableTipodocsSeeder::class);
        

    }

    protected function truncateTablas(array $tablas)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tablas as $tabla) {
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
