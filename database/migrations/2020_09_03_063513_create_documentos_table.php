<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            //$table->tinyInteger('tipo_document_id');
            $table->string('identificador', 30);
            //$table->unique( array('tipo','identificador') );
            $table->string('ncontrol', 30)->nullable();
            $table->string('title', 100);
            //$table->tinyInteger('tiposolicitud_id')->nullable();
            $table->foreignId('tiposolicitud_id','fk_documentotiposolicitud_tiposolicitudes') // UNSIGNED BIG INT
            ->nullable()->references('id')->on('tiposolicitudes')->onDelete(
                'restrict')->onUpdate('restrict');
            $table->string('observation', 100)->nullable();
            //$table->tinyInteger('estado')->nullable();
            $table->string('foto', 100)->nullable();
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
