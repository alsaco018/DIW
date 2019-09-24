<!DOCTYPE html>

<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Alta de usuario</title>
    
</head>
<body>

    <?php
         $servername = "sql104.phpzilla.net";
         $username = "phpz_24535379";
         $password = "colossusmark45";
         $dbname = "phpz_24535379_diw";
         
         // Create connection
         echo "realizando conexion";
         echo "<br>";
         echo $servername;echo "<br>";
         echo $username;echo "<br>";
         echo $dbname;echo "<br>";
          //establecemos la conexion con la BD
         $conexion = mysqli_connect($servername, $username, $password, $dbname) or
             die("Connection failed: ");
         //valores recibidos del formulario
    
         $nick = $_REQUEST['user'];
         $email = $_REQUEST['email'];
         $pass = $_REQUEST['pass'];

         $seed = Time();
         $token = md5($seed);

         //hasheo de la clave
         $passHash = hash('md5', $pass);
         echo $passHash;
        $sql = "INSERT INTO usuarios(Usuario_nick, Usuario_clave, Usuario_email, Usuario_token_aleatorio) VALUES ('$nick','$passHash','$email','$token')";
         //password_hash($password, PASSWORD_DEFAULT);
         mysqli_query($conexion,$sql)
         or die("Problemas en el insert".mysqli_error($conexion));
         mysqli_close($conexion);
         echo "Ha sido dado de alta";
         
    ?>
</body>
</html>