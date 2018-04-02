<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Profession;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   
   // 	DB::insert('INSERT INTO professions (title) VALUES (:title)',['title'=>'ingeniero1']);//utilizo un marcador ? para indicar la posicion de un parametro dinamico

    Profession::create([     
    	'title'=> 'ingeniero1',
    ]); // MODELO DEL LARAVEL  Y TAMBIEN ME AGREGA LAS FECHAS DE CRACION Y DE MODIFICACION

    Profession::create([     //PRIMERO APUNTO A LA RUTA DONDE ESTA
    	'title'=> 'desarrollador front-end',
    ]); 

    Profession::create([     //PRIMERO APUNTO A LA RUTA DONDE ESTA
    	'title'=> 'desarrollador web',
    ]); 

    factory(App\Profession::class,17)->create();


   //  DB::table('professions')->insert([
     	//atributos q quiero guardar o valores que guardo en esta tabla
     //	'title'=> 'ingeniero1',

    // ]);
     /*DB::table('professions')->insert([
     	//atributos q quiero guardar o valores que guardo en esta tabla
     	'title'=> 'desarrollador front-end',

     ]);

      DB::table('professions')->insert([
     	//atributos q quiero guardar o valores que guardo en esta tabla
     	'title'=> 'desarrollador web',

     ]);*/
    }
}
