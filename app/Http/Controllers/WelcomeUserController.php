<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeUserController extends Controller
{
   

    public function __invoke ($name,$apellido = null)// con este no cesito llamarlo
    {
    	$name=ucfirst($name);
	if($apellido){
     return "BINEVENIDO: {$name}, tu apellido es {$apellido}";
}else{
	return "BINEVENIDO {$name}, no tiene apellido";
    }

}
}