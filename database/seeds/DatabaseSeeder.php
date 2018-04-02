<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() // registro mi Seeder aqui
    {
    	
      $this->truncateTables([
      	'users',
     'professions'
      ]);//las tablas q quiero vaciar 
      $this->call(ProfessionSeeder::class);//es mejor este me genera el error
      $this->call(UserSeeder::class);
}

protected  function  truncateTables (array $tables) // registro mi Seeder aqui
    {
    	
       
    	//dd(ProfessionSeeder::class); 
        // $this->call(UsersTableSeeder::class)
           DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
          
           foreach ($tables as $table) {
           	 DB::table($table)->truncate(); // este metodo me permite vaciar la tabla
           }
           DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
         
}
    }

