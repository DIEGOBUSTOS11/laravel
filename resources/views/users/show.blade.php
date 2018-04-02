
@extends('layout')
@section('title',"Usuario {$user->id}")

@section ('content')
<h1>Usuarios{{ $user->id }}</h1>

  <p>Nombre Del Usuario {{ $user->name }}</p>    
  <p>Correo electronico {{ $user->email}} </p>
  <p>
  	<a href="{{ route('users.index') }}">Regresar al listado de usuarios</a>
  </p>
@endsection