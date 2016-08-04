<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 {!! Html::style('assets/css/bootstrap.css') !!}
</head>
<body>

		<h1>Creacion de Permisos</h1><hr>
		<div class="col-md-6 col-md-offset-3">
				@if(Session::has('message'))
							<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
				@endif
				
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 style="text-align: center;">Crear Permiso</h4>
				</div>
				<div class="panel-body">
					<div>
						<form class="form-horizontal" method="POST" action="/permisos/store/">							
							<input type="hidden" name="_token" value="{{ csrf_token() }}">	
							<div class="form-group">
								<label class="col-md-4 control-label" for="textinput">Nombre</label>  
								<div class="col-md-4">
									<input id="textinput" name="nombre" type="text" placeholder="Ingrese Nombre del Permiso" value="" class="form-control input-md" required>
								</div>
							</div>																		
							<div class="form-group">
								<label class="col-md-4 control-label" for="textinput3">Descripcion</label>  
								<div class="col-md-4">									
									<textarea name="descripcion"rows="4" cols="50" class="form-control input-md" placeholder="Ingrese Descripcion"></textarea>
								</div>
							</div>
							<div class="form-group">						
							
							<div class="form-group">
								<label class="col-md-4 control-label" for="singlebutton"></label>
								<div class="col-md-8">
									<button id="singlebutton" name="singlebutton" class="btn btn-primary">Crear</button>
									<a href="/roles"><span class="btn btn-success">Cancelar</span></a>
								</div>
							</div>
						</form>	
					</div>
				</div>
			</div>	
		</div>
</body>
</html>




