<!DOCTYPE html>

<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Alta de alumno</title>
    
</head>
<body>
	<?php
	$conexion = mysqli_connect("localhost","root","","diw") or
    die("Problemas con la conexión");
    
    
   
    mysqli_query($conexion,"insert into usuarios(Usuario_nombre,Usuario_nick,Usuario_nick,Usuario_email,Usuario_clave,Usuario_token_aleatorio) values 
                       ('$_REQUEST[nombre]','$_REQUEST[email]',$_REQUEST[codigoCurso], '$nom')")
  	or die("Problemas en el select".mysqli_error($conexion));
  	mysqli_close($conexion);

	?>
	
</body>
</html>