<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 {!! Html::style('assets/css/bootstrap.css') !!}
</head>
<body>

		<h1>Edicion de Perfil</h1><hr>
		<div class="col-md-6 col-md-offset-3">
				@if(Session::has('message'))
							<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
				@endif
				
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 style="text-align: center;">Perfil de Usuario</h4>
				</div>
				<div class="panel-body">
					<div>
						<form class="form-horizontal" method="POST" action="/usuarios/update/{{$usuario->id}}">							
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<div class="col-md-6">
									<input id="textinput" name="id" type="hidden" placeholder="*Nombre" value="{{$usuario->id}}" class="form-control input-md" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="textinput">Id</label>  
								<div class="col-md-4">
									<input id="textinput" name="id" type="text" value="{{$usuario->id}}" class="form-control input-md" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="textinput">Nombres</label>  
								<div class="col-md-4">
									<input id="textinput" name="nombres" type="text" placeholder="*Nombre" value="{{$usuario->name}}" class="form-control input-md" required>
								</div>
							</div>																		
							<div class="form-group">
								<label class="col-md-4 control-label" for="textinput3">Correo</label>  
								<div class="col-md-4">
									<input id="textinput3" name="email" type="email" placeholder="*nombre@ejemplo.com" value="{{$usuario->email}}" class="form-control input-md" required>   
								</div>
							</div>
							<div class=" form-group ">
								<table class="table table-bordered">
									<thead>
										<tr>											
											<th style="text-align: center;">Roles</th>											
											<th style="text-align: center;" colspan="2">Borrar</th>
										</tr>
									</thead>
									<tbody>
										@foreach($usuario->roles2() as $rol)									
										<tr>
											<td style="text-align: center;">											  
												 {{ $rol->name}}											   
											</td>
											<td style="text-align: center;">  
												<input type="checkbox" name="rol[]" value="{{ $rol->id}}"> 												
											</td>
										</tr>
										@endforeach 
									</tbody>
								</table>
							</div>
							
							<div class="">
								<table class="table table-bordered">
									<thead>
										<tr>											
											<th style="text-align: center;">Permisos del Rol</th>
											<th style="text-align: center;" colspan="2">Borrar</th>
										</tr>
									</thead>
									<tbody>	
										@foreach($usuario->permisosRol() as $permiso)
										<tr>
											<td style="text-align: center;">
											    
												 {{ $permiso->name}}</br>
											    
											</td>											
											<td style="text-align: center;">  
												<input type="checkbox" name="borrar_permisos[]" value="{{ $permiso->id}}">
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>

							<div class="">
								<table class="table table-bordered">
									<thead>
										<tr>											
											<th style="text-align: center;">Permisos del Usuario</th>
											<th style="text-align: center;" colspan="2">Borrar</th>
										</tr>
									</thead>
									<tbody>	
										@foreach($usuario->permisosUsuario() as $permiso)
										<tr>
											<td style="text-align: center;">
											    
												 {{ $permiso->name}}</br>
											    
											</td>											
											<td style="text-align: center;">  
												<input type="checkbox" name="borrar_permisos_user[]" value="{{ $permiso->id}}">
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							
							<div class="form-group">
								<label class="col-md-4 control-label" for="singlebutton">Roles</label>
								<select name="idrol">
									<option value="0">Seleccionar</option>
									@foreach($roles as $rol)
									<option value="{{$rol->id}}">{{$rol->name}}</option>
									@endforeach
								</select>
								
							</div>
							
							<div class="form-group">
								<label class="col-md-4 control-label" for="singlebutton">Permisos</label>
								<select name="idpermiso">
									<option value="0">Seleccionar</option>
									@foreach($permisos as $permiso)
									<option value="{{$permiso->id}}">{{$permiso->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="singlebutton"></label>
								<div class="col-md-8">
									<button id="singlebutton" name="singlebutton" class="btn btn-primary">Actualizar</button>
									<a href="/admin"><span class="btn btn-success">Cancelar</span></a>
								</div>
							</div>
						</form>	
					</div>
				</div>
			</div>	
		</div>
</body>
</html>




