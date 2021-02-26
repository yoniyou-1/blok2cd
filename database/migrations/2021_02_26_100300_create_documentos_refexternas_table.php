<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosRefexternasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_refexternas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('refexterna_id','fk_documentorefexterna_refexternas') // UNSIGNED BIG INT
            ->nullable()->references('id')->on('refexternas')->onDelete(
                'restrict')->onUpdate('restrict');

            $table->foreignId('documento_id','fk_documentorefexterna_documentos')->nullable()->references('id')->on('documentos')->onDelete(
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
        Schema::dropIfExists('documentos_refexternas');
    }
}
