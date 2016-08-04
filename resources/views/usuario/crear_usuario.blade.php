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
					<h4 style="text-align: center;">Crear Usuario</h4>
				</div>
				<div class="panel-body">
					<div>
						<form class="form-horizontal" method="POST" action="/usuarios/store/">							
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<div class="col-md-6">
									<input id="textinput" name="id" type="hidden" placeholder="*Nombre" value="" class="form-control input-md" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="textinput">Id</label>  
								<div class="col-md-4">
									<input id="textinput" name="id" type="text" value="" class="form-control input-md" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="textinput">Nombres</label>  
								<div class="col-md-4">
									<input id="textinput" name="nombres" type="text" placeholder="*Nombre" value="" class="form-control input-md" required>
								</div>
							</div>																		
							<div class="form-group">
								<label class="col-md-4 control-label" for="textinput3">Correo</label>  
								<div class="col-md-4">
									<input id="textinput3" name="email" type="email" placeholder="*nombre@ejemplo.com" value="" class="form-control input-md" required>   
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label" for="textinput3">Contraseña</label>  
								<div class="col-md-4">
									<input name="password" type="password" placeholder="ingresa tu contraseña" value="" class="form-control input-md" required>   
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-4 control-label" for="singlebutton"></label>
								<div class="col-md-8">
									<button id="singlebutton" name="singlebutton" class="btn btn-primary">Crear</button>
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




