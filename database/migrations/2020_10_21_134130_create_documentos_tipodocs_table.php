<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTipodocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_tipodocs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipodoc_id','fk_documentotipodoc_tipodocs') // UNSIGNED BIG INT
            ->nullable()->references('id')->on('tipodocs')->onDelete(
                'restrict')->onUpdate('restrict');

            $table->foreignId('documento_id','fk_documentotipodoc_documentos')->nullable()->references('id')->on('documentos')->onDelete(
                'restrict')->onUpdate('restrict');
            $table->boolean('state')->default(1);
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
        Schema::dropIfExists('documentos_tipodocs');
    }
}
