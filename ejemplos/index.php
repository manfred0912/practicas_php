<html>
  <body>
  	<form action="resp.php" method="post">
  		<label>Nombre</label>
  		<input type="text" name="nomb"><br>
  		<label>Apellido</label>
  		<input type="text" name="ap"><br>

  		<hr>

  		RADIO BUTTON<br>
  		<input type="radio" name="genero" value="M">Masculino<br>
  		<input type="radio" name="genero" value="F">Femenino<br>
  		<input type="radio" name="genero" value="O" checked>Otro<br>

		  <hr>

		  CHECK BOX<br>
		  <input type="checkbox" name="opc1" value="Lic.">Licenciado<br>
		  <input type="checkbox" name="opc2" value="Mtro.">Maestro<br>
		  <input type="checkbox" name="opc3" value="Dr.">Doctor<br>
		  <hr>

  	<input type="submit" value="Aceptar">

  	</form>


  </body>
</html>