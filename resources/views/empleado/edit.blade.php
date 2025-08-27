<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registro crud</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>



Formulario de edición de empleado

<form action="{{url ('/empleado/ '.$empleado->id) }}" method="post" enctype="multipart/form-data">
	@method('PUT')
@csrf 



<h1> Empleado</h1>  

<label for="nombre"> Nombre: </label><br>
<input type="text" name="nombre" value="{{ isset($empleado ->nombre)?$empleado ->nombre:'' }}" id="nombre">   <br>

<label for="apellido_paterno"> Apellido paterno:</label><br>
<input type= "text" name= "apellido_paterno" value="{{ isset($empleado ->apellido_paterno)? $empleado ->apellido_paterno:'' }}" id= "apellido_paterno">    <br>

<label for="apellido_materno"> Apellido materno:</label><br>
<input type="text" name="apellido_materno" value="{{isset ($empleado ->apellido_materno)?$empleado ->apellido_materno:'' }}" id="apellido_materno"><br>

<label for="correo"> Correo:</label><br>
<input type="text" name="correo" value="{{ isset($empleado ->correo)?$empleado ->correo:'' }}" id="correo"><br>

<label for="foto"> Foto:</label><br>
    @if (isset($empleado->foto))  
    <img src="{{asset ('storage').'/'.$empleado->foto}}" width="100" alt=""> 
    @endif
<input type="file" name="foto" value="" id="foto"><br>

<label for="status"> Status:</label>
<input type="hidden"  class="form-check-input" name="status" value= 0>
<input type="checkbox" name="status" value=1 {{$empleado->status ? 'checked' : ''}}><br>

<button type="submit" class="btn btn-success">Editar</button>



<!--<a href="{{ url('empleado/')}}">Regresar </a>-->

<br>
</form>


