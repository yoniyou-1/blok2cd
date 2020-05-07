<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rol_id','fk_usuariorol_roles') // UNSIGNED BIG INT
            ->nullable()->references('id')->on('roles')->onDelete(
                'restrict')->onUpdate('restrict');

            $table->foreignId('usuario_id','fk_usuariorol_usuarios')->nullable()->references('id')->on('usuarios')->onDelete(
                'restrict')->onUpdate('restrict');
            $table->boolean('state');
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
        Schema::dropIfExists('usuarios_roles');
    }
}
