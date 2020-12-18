<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTipoestadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_tipoestados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipoestado_id','fk_documentotipoestado_tipoestados') // UNSIGNED BIG INT
            ->nullable()->references('id')->on('tipoestados')->onDelete(
                'restrict')->onUpdate('restrict');

            $table->foreignId('documento_id','fk_documentotipoestado_documentos')->nullable()->references('id')->on('documentos')->onDelete(
                'restrict')->onUpdate('restrict');
            //$table->integer('state')->default(0);
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
        Schema::dropIfExists('documentos_tipoestados');
    }
}
