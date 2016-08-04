<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 {!! Html::style('assets/css/bootstrap.css') !!}
	  
</head>
<body>
	<div class="container">
		<h1>Gestión de Permisos</h1>
		<nav class="navbar navbar-default">
		   <div class="container-fluid">      
			  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				 <ul class="nav navbar-nav">
					<li class="active"><a href="/administrador/admin/">Permisos Actuales</a></li>
					<li><a href="/permisos/create/">Crear Permiso</a></li>
					<li><a href="/admin">Gestion Usuarios</a></li>		
				 </ul>
			  </div>
		   </div>
		</nav>

		<div class="panel panel-success">
		   <div class="panel-heading">
			  <h4>Lista de Permisos</h4>
		   </div>

		   <div class="panel-body">
			<div class="">
			  <table class="table table-bordered">
			  
				<thead>
					<tr>
						<th style="text-align: center;">Id</th>
						<th style="text-align: center;">Nombre</th>						
						<th style="text-align: center;" colspan="2">Acciones</th>
					</tr>
				</thead>
				<tbody>
				 @foreach($permisos as $item)
					<tr>
						<td style="text-align: center;"> {{ $item->id}}</td>
						<td style="text-align: center;"> {{ $item->name}} </td>	
						<td style="text-align: center;">
						  <a href="/permisos/edit/{{ $item->id}}"><span class="btn btn-success btn-sm">Editar</span></a>
						</td>
						<td style="text-align: center;">  
							<a onclick="return confirmSubmit()" href="{{ url('/permisos/destroy/',$item->id) }}"> 
							<span class="btn btn-danger btn-sm">Eliminar</span></a>  
						</td>
					</tr>
				 @endforeach
				</tbody>
			  </table>
			</div> 
		   </div>
		</div>

		@if(Session::has('message'))
		   <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
		@endif
	</div>

<body>
</html>
            

