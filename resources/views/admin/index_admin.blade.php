<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 {!! Html::style('assets/css/bootstrap.css') !!}
	<script LANGUAGE="JavaScript">

	   function confirmSubmit()
	   {
	   var agree=confirm("Está seguro de eliminar este registro? Este proceso es irreversible.");
	   if (agree)
		 return true ;
	   else
		  return false ;
	   }
	</script>  
</head>
<body>
	<div class="container">
		<h1>Gestión de Usuarios</h1>
		<nav class="navbar navbar-default">
		   <div class="container-fluid">      
			  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				 <ul class="nav navbar-nav">
					<li class="active"><a href="/admin">Directorio</a></li>
					<li><a href="/usuarios/create">Crear usuario</a></li>
					<li><a href="/home">Panel de Control</a></li>						
				 </ul>
			  </div>
		   </div>
		</nav>                                                                                                                                                                                                           

		<div class="panel panel-success">
		   <div class="panel-heading" style="color: white;background: black;">
			  <h4>Lista de usuarios</h4>
		   </div>

		   <div class="panel-body">
			<div class="">
			  <table class="table table-bordered">
			  
				<thead>
				 <tr>
					<th style="text-align: center;">Id</th>
					<th style="text-align: center;">Nombres</th> 
					<th style="text-align: center;">Correo</th>	
					<th style="text-align: center;">Roles</th>
					<th style="text-align: center;">Permisos del Rol</th>
					<th style="text-align: center;">Permisos de Usuario</th>
					<th style="text-align: center;" colspan="2">Procesos</th>
				</tr>
				</thead>
				<tbody>
				 @foreach($usuarios as $item)
					<tr>
						<td style="text-align: center;"> {{ $item->id}}</td>
						<td style="text-align: center;"> {{ $item->name}} </td>
						<td style="text-align: center;"> {{ $item->email }} </td>
						<td style="text-align: center;">
						   @foreach($item->roles2() as $rol) 
							 {{ $rol->name}}</br>
						   @endforeach 
					    </td>
						<td style="text-align: center;">
						   @foreach($item->permisosRol() as $permiso) 
							 {{ $permiso->name}}</br>
						   @endforeach 
					    </td>
					    <td style="text-align: center;">
						   @foreach($item->permisosUsuario() as $permiso) 
							 {{ $permiso->name}}</br>
						   @endforeach 
					    </td>
						<td style="text-align: center;">
						  <a href="usuarios/edit/{{ $item->id}}"><span class="btn btn-success btn-sm" style="background: #3c8dbc;border-color: #3c8dbc;">Editar</span></a>
						  <a href="usuarios/destroy/{{ $item->id}}"><span class="btn btn-danger btn-sm" style="background: black;border-color: black;">Eliminar</span></a>
						</td>						
					</tr>
				 @endforeach
				</tbody>
			  </table>
			</div> <!-- -->
		   </div>
		</div>

		@if(Session::has('message'))
		   <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
		@endif
	</div>

<body>
</html>
            

