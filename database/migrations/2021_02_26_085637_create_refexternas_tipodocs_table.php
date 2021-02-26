<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefexternasTipodocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refexternas_tipodocs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipodoc_id','fk_refexternatipodoc_tipodocs') // UNSIGNED BIG INT
            ->nullable()->references('id')->on('tipodocs')->onDelete(
                'restrict')->onUpdate('restrict');

            $table->foreignId('refexterna_id','fk_refexternatipodoc_refexternas')->nullable()->references('id')->on('refexternas')->onDelete(
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
        Schema::dropIfExists('refexternas_tipodocs');
    }
}
