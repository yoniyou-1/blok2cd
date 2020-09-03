<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $now = Carbon::now()->toDateTimeString();
        $menu = [
  array('id' => '1','name' => 'Amin','url' => 'admin','orden' => '2','icon' => 'fa-wrench','menu_id' => '0','created_at' => $now,'updated_at' => $now),
  array('id' => '2','name' => 'listar menus','url' => 'admin/menu','orden' => '1','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now),
  array('id' => '3','name' => 'Usuarios','url' => 'usuario','orden' => '3','icon' => 'fa-circle','menu_id' => '0','created_at' => $now,'updated_at' => $now),
  array('id' => '4','name' => 'rol','url' => 'admin/rol','orden' => '2','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now),
  array('id' => '5','name' => 'menu-rol','url' => 'admin/menu-rol','orden' => '3','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now),
  array('id' => '6','name' => 'Menú','url' => '#','orden' => '1','icon' => 'fa-bars','menu_id' => '1','created_at' => $now,'updated_at' => $now),
  array('id' => '7','name' => 'permiso-rol','url' => 'admin/permiso-rol','orden' => '4','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now)
        ];
        DB::table('menus')->insert($menu);
    }
}
