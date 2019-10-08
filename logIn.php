<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<?php
include('dbConfig.php');

$nick = $_REQUEST['user'];
$pass = $_REQUEST['pass'];

$passHash = hash('md5', $pass);


$_SESSION['password'] = $pass;
  //establecemos la conexion con la BD
$db or
    die("Connection failed: ");

    $sql = "select * from usuarios where Usuario_nick = '".$nick."' and Usuario_clave = '".$passHash."'";
          //password_hash($password, PASSWORD_DEFAULT);
          $result = mysqli_query($conexion,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      echo $sql;
      echo "<br>";
      // si encuentra al usuario el valor de la fila será 1
		
      if($count == 1) {
        $_SESSION['usuario'] = $nick;
         
         header("location: http://albertosaldanacontreras.phpzilla.net/indexConectado.php");
      }else {
         $error = "Tu nombre de usuario o contraseña no son correctos";
         echo $error;
      }
          mysqli_close($conexion);
?>
</body>
</html>