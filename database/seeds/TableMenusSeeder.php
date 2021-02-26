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
  array('id' => '3','name' => 'Usuarios','url' => 'admin/usuario','orden' => '6','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now),
  array('id' => '4','name' => 'rol','url' => 'admin/rol','orden' => '2','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now),
  array('id' => '5','name' => 'menu-rol','url' => 'admin/menu-rol','orden' => '3','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now),
  array('id' => '6','name' => 'Menú','url' => '#','orden' => '1','icon' => 'fa-bars','menu_id' => '1','created_at' => $now,'updated_at' => $now),
  array('id' => '7','name' => 'permiso','url' => 'admin/permiso','orden' => '4','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now),
  array('id' => '8','name' => 'permiso-rol','url' => 'admin/permiso-rol','orden' => '5','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now),
  array('id' => '9','name' => 'Documento','url' => 'documento','orden' => '3','icon' => 'fa-book','menu_id' => '0','created_at' =>  $now,'updated_at' =>  $now),
  array('id' => '10','name' => 'Tipo de Documento','url' => 'admin/tipodoc','orden' => '3','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now),
  array('id' => '11','name' => 'pregunta','url' => 'admin/pregunta','orden' => '5','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now),
  array('id' => '12','name' => 'pregunta-tipodoc','url' => 'admin/pregunta-tipodoc','orden' => '8','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now),
  array('id' => '13','name' => 'tipo de solicitud','url' => 'admin/tiposolicitud','orden' => '4','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now),
  array('id' => '14','name' => 'tipo de estado','url' => 'admin/tipoestado','orden' => '7','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now),
  array('id' => '15','name' => 'tipoestado-tipodoc','url' => 'admin/tipoestado-tipodoc','orden' => '11','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now),
  array('id' => '16','name' => 'tipo de fecha','url' => 'admin/tipofecha','orden' => '11','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now),
  array('id' => '17','name' => 'tipofecha-tipodoc','url' => 'admin/tipofecha-tipodoc','orden' => '14','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now),
  array('id' => '18','name' => 'Referencia Externa','url' => 'admin/refexterna','orden' => '15','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now),
  array('id' => '19','name' => 'Refexterna-tipodoc','url' => 'admin/refexterna-tipodoc','orden' => '16','icon' => 'fa-circle','menu_id' => '6','created_at' => $now,'updated_at' => $now)
        ];
        DB::table('menus')->insert($menu);
    }
}
