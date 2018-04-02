<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //ESPECIFICAMOS LO QUE QUIERE Q HAGA ESTA MIGRACION CREAS TABLAS 
    {
        Schema::create('users', function (Blueprint $table) { // TABLA USUARIOS  ES IMPORTATE QUE COINDIDA CON LO Q ESTAS HACIENDO DENTRO DE LA CLASE
            $table->increments('id');// crea la columna auto incremento 

           
            
            $table->string('name');//una columna de tipo varchar 
            $table->string('email')->unique();//una columna del tipo varchar y el unique lo q hace es q no se repita el correo cuando se digite en esa columna
            
            //$table->string('profession',100)->nullable();//columna varchar 
            $table->string('password');//columna varchar 
            //$table->boolean('is_admin')->defaul(false);
           // $table->string('website')->nullable();
            $table->rememberToken();// rememberToken recordar a los usuario o visitas 
            $table->timestamps();//marcas d tiempo dos columnas creado el o actualizado el pueden tener un valor null

             //$table->timestamp('created_at')->nullable();// creado el

             //$table->timestamp('updated_at')->nullable();// actualizado el
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // revertir la operacion en el metodo up la va elimar la tabla en caso q exista
    {
        Schema::dropIfExists('users');
    }
}
