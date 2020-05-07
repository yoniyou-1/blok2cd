<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('slug');
            $table->timestamps();
            $table->charset='utf8mb4';
            $table->collation= 'utf8mb4_spanish_ci' ;
        });

  // Insert some stuff
        DB::table('permissions')->insert(
         array(
             'name' => 'permiso1',
             'slug' => 'describe1',
             'created_at'=> now(),
             'updated_at' => now()
                )
               );
  // fin some stuff

          // Insert some stuff
        DB::table('permissions')->insert(
         array(
             'name' => 'permiso2',
             'slug' => 'describe2',
             'created_at'=> now(),
             'updated_at' => now()
                )
               );
  // fin some stuff

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
