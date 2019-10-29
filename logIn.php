
<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Log in / Registro</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
<link rel="stylesheet" href="assets/css/logIn.css">
<style>
  #error{
    color:red;
  }
  </style>
</head>
<body>
    
<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

/* Exception class. */
require 'PHPMailer/src/Exception.php';

/* The main PHPMailer class. */
require 'PHPMailer/src/PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require 'PHPMailer/src/SMTP.php';
include('dbConfig.php');
session_start();

$email = $_REQUEST['email'];
$pass = $_REQUEST['pass0'];
$passHash = hash('md5', $pass);

$sql = "select Usuario_nick from usuarios where Usuario_email = '".$email."' and Usuario_clave = '".$passHash."' and Usuario_bloqueado = 0";
          //password_hash($password, PASSWORD_DEFAULT);
          $result = mysqli_query($db,$sql);
          $result = $result->fetch_array();
          $nick = $result[0];


$_SESSION['email'] = $email;
$_SESSION['password'] = $pass;
$_SESSION['usuario'] = $nick;
//echo $_SESSION['usuario'];
  //establecemos la conexion con la BD
$db or
    die("Connection failed: ");

    $sql2 = "select * from usuarios where Usuario_email = '".$email."' and Usuario_clave = '".$passHash."' and Usuario_bloqueado = 0";
          //password_hash($password, PASSWORD_DEFAULT);
          $result2 = mysqli_query($db,$sql2);
      //$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
      //$active = $row2['active'];
      
      $count = mysqli_num_rows($result2);
      //echo $sql;
      echo "<br>";
      // si encuentra al usuario el valor de la fila será 1
		
      if($count == 1) {
        $fecha = date("m.d.y");
        $sqlconexion = "UPDATE usuarios SET Usuario_fecha_ultima_conexion='".$fecha."', Usuario_numero_intentos = 0 WHERE Usuario_email = '".$email."'";
        mysqli_query($db,$sqlconexion)
        or die("Problemas en el update 1".mysqli_error($db));

         header("location: http://albertosaldanacontreras.phpzilla.net");
      }else {
        
         $error = "Tu nombre de usuario o contraseña no son correctos";
         
         //$fallos = mysqli_query($db,$sqlFallos);
         //echo $error;
         /*$sqlFallos = "select Usuario_numero_intentos  from usuarios where Usuario_nick = '".$nick."'";
         $nFallos = mysqli_query($db,$sqlFallos)
         or die("Problemas en el select".mysqli_error($db));
         $row = mysqli_fetch_array($nFallos, 'MYSQLI_ASSOC'); // Use something like this to get the result
         $fallos = $row['fallos'];*/
         
         //$nFallos = $nFallos+1;
         //$error = $fallos;
         $sqlFallos2 = "UPDATE usuarios SET Usuario_numero_intentos = (Usuario_numero_intentos + 1) WHERE Usuario_email = '".$email."'";
          mysqli_query($db,$sqlFallos2)
          or die("Problemas en el update 2".mysqli_error($db));

          $mysql_qry = "SELECT Usuario_numero_intentos  FROM usuarios WHERE Usuario_email = '".$email."'";
          $result3 = mysqli_query($db, $mysql_qry);
 
          //$row = mysqli_fetch_array($result, 'MYSQLI_ASSOC'); // Use something like this to get the result
          //$quantity = $row['quantity'];
          //$error = $quantity;
          $result3 = $result3->fetch_array();
          $quantity = intval($result3[0]);
        if($quantity >= 3){
          $error = "Tu cuenta ha sido bloqueada, revisa tu correo para desbloquearla.";
          $sqlBloqueo = "UPDATE usuarios SET Usuario_bloqueado=1 WHERE Usuario_email = '".$email."'";
          mysqli_query($db,$sqlBloqueo)
          or die("Problemas en el update 3".mysqli_error($db));

        $mailer = new PHPMailer(TRUE);
        
        
         try {
          /* Set the mail sender. */
          $mailer->setFrom('albertosaldanadiw@gmail.com', 'Alberto');
       
          /* Add a recipient. */
          $mailer->addAddress($email, 'Usuario');
       
          /* Set the subject. */
          $mailer->Subject = 'Bloqueo de cuenta en La Gallina Violeta';
       
          /* Set the mail message body. */
          $mailer->Body .= "<meta charset='UTF-8'><h1>Bloqueo de cuenta en La Gallina Violeta</h1><br><br>";
          $mailer->Body .= "<h3>".$nick." tu cuenta se ha bloqueado</h3><br>";
          $mailer->Body .= "<p>Para reactivar tu cuenta pulsa este enlace: <a href='http://www.albertosaldanacontreras.phpzilla.net/reactivarCuenta.php?email=<?php echo $email;?>'>Reactivar cuenta</a>";
          $mailer->IsHTML(true);

          $mailer->isSMTP();
          $mailer->Host = 'smtp.gmail.com';
          $mailer->Port = 587;
          $mailer->SMTPAuth = true;
          $mailer->SMTPSecure = 'tls';

          /* Username (email address). */
          $mailer->Username = 'albertosaldanadiw@gmail.com';

          /* Google account password. */
          $mailer->Password = 'colossusmark45';
                
          /* Finally send the mail. */
          $mailer->send();
       }
       catch (Exception $e)
       {
          /* PHPMailer exception. */
         echo $e->errorMessage();
       }
       catch (\Exception $e)
       {
          /* PHP exception (note the backslash to select the global namespace Exception class). */
          echo $e->getMessage();
       }
            
      }
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
            <label for="email" class="label">Email</label>
              <input name="email" id="email" type="text" class="input">
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
                <p id="error"><?php echo $error; ?></p>
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