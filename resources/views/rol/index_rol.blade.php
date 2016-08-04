<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 {!! Html::style('assets/css/bootstrap.css') !!}
	  
</head>
<body>
	<div class="container">
		<h1>Gestión de Roles</h1>
		<nav class="navbar navbar-default">
		   <div class="container-fluid">      
			  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				 <ul class="nav navbar-nav">
					<li class="active"><a href="">Roles Actuales</a></li>
					<li><a href="/roles/create/">Crear Rol</a></li>
					<li><a href="/home">Panel de Control</a></li>		
				 </ul>
			  </div>
		   </div>
		</nav>

		<div class="panel panel-success">
		   <div class="panel-heading" style="color: white;background: black;">
			  <h4>Lista de Roles</h4>
		   </div>

		   <div class="panel-body">
			<div class="">
			  <table class="table table-bordered">
			  
				<thead>
					<tr>
						<th style="text-align: center;">Id</th>
						<th style="text-align: center;">Nombre</th>
						<th style="text-align: center;">Permisos</th>
						<th style="text-align: center;" colspan="2">Acciones</th>
					</tr>
				</thead>
				<tbody>
				 @foreach($roles as $item)
					<tr>
						<td style="text-align: center;"> {{ $item->id}}</td>
						<td style="text-align: center;"> {{ $item->name}} </td>						
						<td style="text-align: center;">
							@foreach($item->permisos2() as $permiso) 
								 {{ $permiso->name}}</br>
							@endforeach						  
					    </td>
						<td style="text-align: center;">
						  <a href="/roles/edit/{{ $item->id}}"><span class="btn btn-success btn-sm" style="background: #3c8dbc;border-color: #3c8dbc;">Editar</span></a>
						</td>
						<td style="text-align: center;">  
							<a onclick="return confirmSubmit()" href="{{ url('/roles/destroy/',$item->id) }}"> 
							<span class="btn btn-danger btn-sm" style="background: black;border-color: black;">Eliminar</span></a>  
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
            

