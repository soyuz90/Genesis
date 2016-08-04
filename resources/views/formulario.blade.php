<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="/prueba/actualizar/">
	  <input type="hidden" name="_token" value="{{ csrf_token() }}">
	  <input name="_method" type="hidden" value="PUT">
	  Nombre:<br>
	  <input type="text" name="nombre"><br>
	  Correo:<br>
	  <input type="text" name="correo" ><br><br>
	  <input type="submit" value="Enviar">
	</form>
</body>
</html>

