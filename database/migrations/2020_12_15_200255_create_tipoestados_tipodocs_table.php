<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoestadosTipodocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoestados_tipodocs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipodoc_id','fk_tipoestadotipodoc_tipodocs') // UNSIGNED BIG INT
            ->nullable()->references('id')->on('tipodocs')->onDelete(
                'restrict')->onUpdate('restrict');

            $table->foreignId('tipoestado_id','fk_tipoestadotipodoc_tipoestados')->nullable()->references('id')->on('tipoestados')->onDelete(
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
        Schema::dropIfExists('tipoestados_tipodocs');
    }
}
