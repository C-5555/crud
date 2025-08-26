<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Crud</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
{{ Session ::get ('mensaje')}}
@endif

<a href="{{url('empleado/create')}}">Registrar nuevo empleado</a>

<table class= "table table-primary">
    <thead class="thead-info">
        <tr>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th>Correo</th>
            <th>Status</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
        <tr class="table-secondary">

            <td>
            <img src="{{asset ('storage').'/'.$empleado->foto}}" width="100" alt="">    
            </td>


            <td>{{$empleado->nombre}}</td>
            <td>{{$empleado->apellido_paterno}}</td>
            <td>{{$empleado->apellido_materno}}</td>
            <td>{{$empleado->correo}}</td>
            <td>
                @if ($empleado->status)
                    <span class= "text-success"> ✓ Activo </span>
                @else
                    <span class="text-danger"> Inactivo </span>
                @endif 
                <!--{{$empleado -> status_icon}} {{$empleado ->status_text}}-->
            </td>

            
            <td> 
                 <a href="{{ url('/empleado/'.$empleado->id) }}">
                Ver 
                </a>  
            </td>
            <td>
                
            <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}">
            editar 
            </a>
            | 

            <form action="{{ url('/empleado/'.$empleado->id ) }}" method="post">
                @csrf 
                {{ method_field ('DELETE') }}
                <input type="submit" onclick="return confirm ('¿Quieres borrar?')" 
                value="Borrar">
            </form>

        
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div> 
@endsection