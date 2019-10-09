<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Log in / Registro</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
<link rel="stylesheet" href="assets/css/logIn.css">
</head>
<body>
    
<?php
include('dbConfig.php');
session_start();
$nick = $_REQUEST['user'];
$pass = $_REQUEST['pass'];

$passHash = hash('md5', $pass);


$_SESSION['password'] = $pass;
$_SESSION['usuario'] = $nick;
//echo $_SESSION['usuario'];
  //establecemos la conexion con la BD
$db or
    die("Connection failed: ");

    $sql = "select * from usuarios where Usuario_nick = '".$nick."' and Usuario_clave = '".$passHash."'";
          //password_hash($password, PASSWORD_DEFAULT);
          $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      //echo $sql;
      echo "<br>";
      // si encuentra al usuario el valor de la fila será 1
		
      if($count == 1) {
        
         
         header("location: http://albertosaldanacontreras.phpzilla.net/indexConectado.php");
      }else {
         $error = "Tu nombre de usuario o contraseña no son correctos";
         //echo $error;
      }
          mysqli_close($db);
?>
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Log in</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrarse</label>
		<div class="login-form">
			<div class="sign-in-htm">
          <form action="logIn.php" method="post" name="form">
            <div class="group">
            <label for="user" class="label">Nick</label>
              <input name="user" id="user" type="text" class="input">
            </div>
            <div class="group">
              <label for="pass" class="label">Contraseña</label>
              <input name="pass" id="pass" type="password" class="input" data-type="password">
            </div>
            <div class="group">
              <input id="check" type="checkbox" class="check" checked>
              <label for="check"><span class="icon"></span>Mantenerme conectado</label>
            </div>
            <div class="group">
                <p><?php echo $error; ?></p>
            </div>
            <div class="group">
              <input type="submit" class="button" value="Sign In">
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
              <a href="#forgot">¿Has olvidado la contraseña?</a>
            </div>
            </form>
      </div>
			<div class="sign-up-htm">
          <form action="registro.php" method="post" enctype="multipart/form-data">
            <div class="group">
              <label for="user" class="label">Nick</label>
              <input name="user" id="user" type="text" class="input">
            </div>
            <div class="group">
              <label for="pass" class="label">Contraseña</label>
              <input name="pass" id="pass" type="password" class="input" data-type="password">
            </div>

            <div class="group">
              <label for="pass2" class="label">Vuelve a escribir la contraseña</label>
              <input id="pass2" type="password" class="input" data-type="password">
            </div>

            <div class="group">
              <label for="email" class="label">Email</label>
              <input name="email" id="email" type="email" class="input">
            </div>
            <div class="group">
              <button type="submit" class="button" value="registrase">Registrarse</button>
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
              <label for="tab-1">¿Ya perteneces a la web?</a>
            </div>
            </form>
			</div>
		</div>
	</div>
</div>

</body>
</html>