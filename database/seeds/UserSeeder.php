<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Profession;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    //$profressions= DB::select('SELECT id FROM professions WHERE title= ?',['ingeniero1']);
   // dd($profressions[0]->id);
     //dd($profressions);
    

     //$profression = DB::table('profressions')->select('id')->take(1)->get();
       // $profession = DB::table('professions')->select('id','title')->WHERE('title','=','ingeniero1')->first();// la ejecuto con metodo first para  tener un solo resultado

      //$professionId= DB::table('professions')
      //  ->WhereTitle('ingeniero1')
        //>value('id');
        
     // dd($profression->first()->id);
       // dd($professionId);

     /*DB::table('users')->insert([ //profession [0]
     //atributos q quiero guardar o valores que gurdo en esta tabla
     'name'=> 'diego bustos',
     'email'=> 'ferchobmg@gmail.com',
     'password'=> bcrypt('diegoyaleja'),// con esto puedo incrictar la clave del usuario bcrypt y si
      // quiere q aparesca  normal no le pone esto para incricitar la clave del usuario
      //'profession_id'=> $professionId->id,// como enlazar un usuario con una profresions
     'profession_id'=> $professionId= DB::table('professions')->whereTitle('ingeniero1')->value('id')
     ]);*/



     /*User::create([ //Eloquent genera las fechas
      'name'=> 'diego bustos',
     'email'=> 'ferchobmg@gmail.com',
     'password'=> bcrypt('diegoyaleja'),
     'profession_id'=> $professionId= Profession::whereTitle('ingeniero1')->value('id') //PUEDO COMBINAR SQL CON ELOQUENT

     ]);¨*/


     factory(App\User::class)->create([ //Eloquent genera las fechas
      'name'=> 'diego bustos',
     'email'=> 'ferchobmg@gmail.com',
     'password'=> bcrypt('diegoyaleja'),
     'profession_id'=> $professionId= Profession::whereTitle('ingeniero1')->value('id') //PUEDO COMBINAR SQL CON ELOQUENT

     ]);
     
     factory(App\User::class)->create([ // usuarios aletorios pero le agrego la profesiion
      'profession_id' => $professionId=Profession::whereTitle('ingeniero1')->value('id') //PUEDO COMBINAR 

     ]);


   

   factory(User::class)->create([
    'name' => 'diego',
   ]);
    
    factory(User::class)->create([
    'name' => 'fernando',
   ]);

factory(User::class)->create([
    'name' => 'alejandra',
   ]);

  factory(App\User::class,3)->create();
     


    }
}
