@extends('layout')
@section('title',"Editar usuarios")
@section ('content')

<h1>EDITAR USUARIOS</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
      <h6>Por favor corrige los errores debajo:</h6>
       <ul>
          @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
       </ul>

    </div>
    @endif 

  <form   method="POST" action="{{ url("usuarios/{$user->id}") }}">
    {{ method_field('PUT') }}
  	{{  csrf_field() }}

    <label for="name">Nombre:</label>
  	<input type="text" name="name" id=name placeholder="pablo malo" value="{{ old('name',$user->name) }}">
   
    <br>
  	<label for="email">Correo electronico:</label>
  	<input type="email" name="email" id=email placeholder="ejemplo@example.com"  value="{{ old('email',$user->email) }}">
    <br>
    <label for="password">Contraseña:</label>
  	<input type="password" name="password" id=password  placeholder="Mayor a 6 caracteres">
    <br>
    <button  type="submit">Actualizar  Usuario</button>


  </form>
  <p>
  	<a href="{{ route('users.index') }}">Regresar al listado de usuarios</a>
  </p>
@endsection