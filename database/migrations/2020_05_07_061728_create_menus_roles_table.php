<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rol_id','fk_menurol_roles') // UNSIGNED BIG INT
            ->nullable()->references('id')->on('roles')->onDelete(
                'restrict')->onUpdate('restrict');

            $table->foreignId('menu_id','fk_menurol_menus')->nullable()->references('id')->on('menus')->onDelete(
                'restrict')->onUpdate('restrict');
            //$table->boolean('state');
            $table->timestamps();
            $table->charset='utf8mb4';
            $table->collation= 'utf8mb4_spanish_ci' ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus_roles');
    }
}
    