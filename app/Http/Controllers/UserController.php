<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //

    public function  index(){

    //$users = DB::table('users')->get(); //listado de usuarios dinamicamente
     
     $users = User::all(); //utilizamso  el modelo eloquent
      // return view('users.index')
      // ->with('users',User::all())
      // ->with('title','Listado de usuarios');
 
    
   //dd($users); //imprimo todos los usuarios
    $title = 'Listado de usuarios';
    return view('users.index',compact('title','users')); // array asociativo
       

    }


    public function show(user $user)
    {

    //$user  = User::findOrFail($id);// lo vuelve una respuesta de tipo 404

   /// if($user == null){

      //return view('errors.404');
     // return  response()->view('errors.404', [], 404);
    //}
    //exit('linea no alcanzada');
   // dd($user);

    return view('users.show',compact ('user'));
      //return "Mostrar detalle del usuario: {$id}";

   }

    public function create(){
    return view('users.create');
   }

   public  function store(){

   // return  redirect ('usuarios/nuevo')
   // ->withInput();

    $data = request()->validate([
     'name'=> 'required',
     'email'=>['required','email','unique:users,email'],
     'password' =>'required',
   ],[
    'name.required' => 'El campo nombre es obligatorio'
   ]);
   //dd($data);
    User::create([

      'name'=> $data['name'],
      'email' => $data['email'],
      'password' => bcrypt($data ['password'])
    ]);

    return redirect()->route('users.index');
   }

   public function edit(User $user){
    return  view('users.edit', ['user' => $user]);

   }



  public function update(User $user){

 //dd('actualizar');

   $data = request()->validate([

   'name' => 'required',
   //'email' => ['required','email', Rule::unique('users')->ignore($user->id)],
   // 'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
   'email' => 'required|email|unique:users,email,'.$user->id,
   'password' => '',

   ]);

  if($data['password']!=null){
    $data['password']= bcrypt($data['password']);
  // $user->update($data);
  } else{
    unset($data['password']);
  }
    $user->update($data);
    return  redirect()->route('users.show',['user'=>$user]);       

   //("/usuarios/{$user->id}");
   }


public  function  destroy(User $user){
  $user->delete();
return  redirect()->route('users.index');


}




}















    //dd($dat);

    // if(empty($data['name'])){ // validad q no esten vacios 

    // return redirect ('usuarios/nuevo');
    // ->withErrors([

    //   'name' => 'El campo nombre es obligatorio'
    // )];
    // }
    



  /* public function index (){
   	 return ('Usuarios');
   }*/

  /* public function index (){

    if(request()->has('empty')){

    $users = [];

    } 
    else 
    {

     $users = [
      'diego',

      'fernando',

      'alejandra',

      'camilo',

     // '<script> alert("Clicker")</script>' //un usuario en bien de poner su nombre podria poner codigo javascript
    ];

    }*/

   

    //$title = 'Listado De Usuarios';

      //comprobrar el llamado a una funcion o los datos q tengo en una variable
      //dd(compact('title','users')); // array asocitavio
    
     //	return view('users.index',compact('title','users')); // array asociativo

    /*return view('users',[
      'users' => $users,
      'title' => $title
    ]); */
   

  /*public function index (){

    $users = [
      'diego',

      'fernando',

      'alejandra',

      'camilo',

      '<script> alert("Clicker")</script>' //un usuario en bien de poner su nombre podria poner codigo javascript
    ];
      
    
    return view('users')
     ->with('users', $users)
    ->with('title','Listado De Usuarios');
   }*/


   
   
