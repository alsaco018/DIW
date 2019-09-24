<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Log in/Registro</title>
</head>
<body>

    <?php 
            echo "antes de conectar";
            $conexion = mysqli_connect("localhost","root","","diw") or
            die("Problemas con la conexión");

            //valores recibidos del formulario
    
            $nick = $_REQUEST[user];
            $email = $_REQUEST[email];
            $password = $_REQUEST[pass];

            $seed = Time();
            $token = md5($seed);

            //hasheo de la clave
            $password = hash($token, $password);
            echo $password;

            //password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($conexion,"INSERT INTO 'usuarios'('Usuario_nick', 'Usuario_clave', 'Usuario_email', 'Usuario_token_aleatorio') VALUES ('$nick','$password','$email','$token')")
            or die("Problemas en el select".mysqli_error($conexion));
            mysqli_close($conexion);
            echo "Ha sido dado de alta";
          ?>
    

</body>
</html>