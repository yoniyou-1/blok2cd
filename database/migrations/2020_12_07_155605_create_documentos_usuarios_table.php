<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_usuarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id','fk_documentousuario_usuarios') // UNSIGNED BIG INT
            ->nullable()->references('id')->on('usuarios')->onDelete(
                'restrict')->onUpdate('restrict');

            $table->foreignId('documento_id','fk_documentousuario_documentos')->nullable()->references('id')->on('documentos')->onDelete(
                'restrict')->onUpdate('restrict');
            $table->dateTime('fechaini')->nullable();
            $table->boolean('state')->default(0);
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
        Schema::dropIfExists('documentos_usuarios');
    }
}
