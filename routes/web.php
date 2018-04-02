<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return ('home');
});

/*Route::get('/usuarios', function () { //DESPUES DEL PUBLIC/ escribo Usuarios para poder acceder
    return ('Usuarios');
});*/
Route::get('/usuarios', 'UserController@index')
->name('users.index'); 

Route::get('/usuarios/{user}', 'UserController@show')
->where ('user', '[0-9]+')
->name('users.show'); 
 
Route::get('/usuarios/nuevo','UserController@create') // get usuarios  solicitar y obtener informacion
->name('users.create'); 

Route:: post('/usuarios','UserController@store'); // post usuarios/crear  enviar y procesar informacion

Route::get('/usuarios/{user}/editar','UserController@edit')
->name('users.edit');

Route::put('/usuarios/{user}','UserController@update');

Route::get('/saludo/{name}/{apellido?}','WelcomeUserController') ;


Route::delete('/usuarios/{user}' , 'UserController@destroy')
->name('users.destroy');
//puedo organizar las rutas en el orden que quiera
/*Route::get('/usuarios/nuevo', function () {
	return 'Crear nuevo usuarios';
});*/

/*Route::get('/usuarios/detalles', function() {
	return 'Mostrar detalle del usuario:'.$_GET['id']; //Le doy un valor a la variable id en el naevegador /detalles?=5
})->where ('id', '[0-9]+');*/ // solo numeros del 0 al 9 y mas de un numero en el id

/*Route::get('/usuarios/{id}', function($id) {
	return "Mostrar detalle del usuario: {$id}"; //Le agrego un parametro dinamico para el id
})->where ('id', '[0-9]+'); */// solo numeros del 0 al 9 y mas de un numero en el id /d solo numeros /w letras y numeros 

/*Route::get('/saludo/{name}/{apellido?}', function ($name,$apellido = null) { //ES OPCIONAL PARA PONER EL APELLIDO PONIENDO ?

	$name=ucfirst($name);
	if($apellido){
return "BINEVENIDO: {$name}, tu apellido es {$apellido}";
}
else{
	return "BINEVENIDO {$name}, no tiene apellido";
}
});*/