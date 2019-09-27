<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Animated text fill</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Neuton|Oswald'>
<link rel="stylesheet" href="assets/css/signUp.css"><script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<p>
  Has sido dado de alta
  <span>
    Revisa tu correo
  </span>
  &mdash; y confirma tu cuenta de usuario &mdash;
</p>
<!-- partial -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <?php

         $servername = "sql104.phpzilla.net";
         $username = "phpz_24535379";
         $password = "colossusmark45";
         $dbname = "phpz_24535379_diw";
         
         // Create connection
         
         //echo $servername;echo "<br>";
         //echo $username;echo "<br>";
         //echo $dbname;echo "<br>";
          //establecemos la conexion con la BD
         $conexion = mysqli_connect($servername, $username, $password, $dbname) or
             die("Connection failed: ");
         //valores recibidos del formulario
    
         $nick = $_REQUEST['user'];
         $email = $_REQUEST['email'];
         $pass = $_REQUEST['pass'];

         $token = Time();

         //hasheo de la clave
         $passHash = hash('md5', $pass);
         //echo $passHash;
        $sql = "INSERT INTO usuarios(Usuario_nick, Usuario_clave, Usuario_email, Usuario_token_aleatorio) VALUES ('$nick','$passHash','$email','$token')";
         //password_hash($password, PASSWORD_DEFAULT);
         mysqli_query($conexion,$sql)
         or die("Problemas en el insert".mysqli_error($conexion));
         mysqli_close($conexion);
         
    ?>

</body>
</html>