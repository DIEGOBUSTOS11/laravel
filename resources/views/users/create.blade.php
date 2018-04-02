@extends('layout')
@section('title',"CREAR USUARIO")
@section ('content')


<div class="card">
<h4 class="card-header">Crear Nuevo Usuario</h4>
<div class="card-footer">
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

  <form   method="POST" action="{{ url('usuarios') }}">

    {{  csrf_field() }}

    <div class="form-group">
    <label for="name">Nombre:</label>
    <input type="text"  class="form-control" name="name" id=name placeholder="pablo malo" value="{{ old('name') }}">
    </div>

   <div class="form-group">
    <label for="email">Correo electronico:</label>
    <input type="email"  class="form-control" name="email" id=email placeholder="ejemplo@example.com"  value="{{ old('email') }}">

   </div>

   <div class="form-group">
    <label for="password">Contraseña:</label>
    <input type="password"  class="form-control"name="password" id=password  placeholder="Mayor a 6 caracteres">
   </div>
  
   {{--  @if($errors->has('name'))
    <p>{{ $errors->first('name') }}</p>
    @endif --}}
   
    <button  type="submit" class="btn btn-primary">Crear Usuario</button>
    <a href="{{ route('users.index') }}" class="btn btn-link">Regresar al listado de usuarios</a>

  </form>

</div>
</div>


   
  
  
 
@endsection