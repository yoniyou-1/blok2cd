<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTipodocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_tipodocs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipodoc_id','fk_questiontipodoc_tipodocs') // UNSIGNED BIG INT
            ->nullable()->references('id')->on('tipodocs')->onDelete(
                'restrict')->onUpdate('restrict');

            $table->foreignId('question_id','fk_questiontipodoc_questions')->nullable()->references('id')->on('questions')->onDelete(
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
        Schema::dropIfExists('questions_tipodocs');
    }
}
