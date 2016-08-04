<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 {!! Html::style('assets/css/bootstrap.css') !!}
</head>
<body>

		<h1>Edicion Rol</h1><hr>
		<div class="col-md-6 col-md-offset-3">
				
				@if(Session::has('message'))
							<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
				@endif
				
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 style="text-align: center;">Edicion Rol</h4>
				</div>
				<div class="panel-body">
					<div>
						<form class="form-horizontal" method="POST" action="/roles/update/{{$rol->id}}">							
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label class="col-md-4 control-label" for="textinput">Nombre Rol:</label>  
								<div class="col-md-3">
									<input id="textinput" name="nombres" type="text" placeholder="*Nombre" value="{{$rol->name}}" class="form-control input-md" required>
								</div>
							</div>
							<div class="">
								<table class="table table-bordered">
									<thead>
										<tr>											
											<th style="text-align: center;">Permisos</th>											
											<th style="text-align: center;" colspan="2">Borrar Permiso</th>
										</tr>
									</thead>
									<tbody>										
										@foreach($rol->permisos2() as $permiso)
										<tr>
											<td style="text-align: center;">											  
												 {{ $permiso->name}}											   
											</td>
											<td style="text-align: center;">  
												<input type="checkbox" name="borra_permisos[]" value="{{ $permiso->id}}"> 												
											</td>
										</tr>	
										@endforeach 
									</tbody>
								</table>
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
									<a href="/roles"><span class="btn btn-success">Regresar</span></a>
								</div>
							</div>
						</form>	
					</div>
				</div>
			</div>	
		</div>
</body>
</html>




