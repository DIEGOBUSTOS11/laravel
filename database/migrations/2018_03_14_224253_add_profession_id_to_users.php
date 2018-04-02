<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfessionIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        schema::table('users',function (Blueprint $table){
         $table->unsignedInteger('profession_id')->nullable();
         $table->foreign('profession_id')->references('id')->on('professions');
        });
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      schema::table('users',function (Blueprint $table){
      $table->dropForeigh(['profession_id']); //elimino el id
      $table->dropColumn(['profession_id']); //elimino la columna
      });
    }
}
