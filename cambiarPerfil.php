<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Registro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Neuton|Oswald'>
<link rel="stylesheet" href="assets/css/signUp.css"><script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>


</head>
<body>
<!-- partial:index.partial.html -->
<p>
  Se han modificado tus datos
  <span>
    Satisfactoriamente
  </span>
 
</p>
<p style="margin-top: 35%">

  
  <a style="text-decoration:none;color:white;" href="http://albertosaldanacontreras.phpzilla.net/indexConectado.php" data-toggle="tooltip" data-placement="bottom" title="Volver a la página principal">&mdash; Volver a la página principal &mdash;</a>

</p>
<!-- partial -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <?php
    session_start();
    include('dbConfig.php');
    
          $nick = $_GET['nick'];
          $email = $_SESSION['email'];
          $pass = $_GET['pass'];
          $nombre = $_GET['nombre'];
          $apellido1 = $_GET['apellido1'];
          $apellido2 = $_GET['apellido2'];
          $nif = $_GET['nif'];
          $telefono = $_GET['telefono'];
          $provincia = $_GET['provincia'];
          $poblacion = $_GET['poblacion'];
          $direccion = $_GET['direccion'];

          $_SESSION['nombre'] = $nombre;
          $_SESSION['apellido1'] = $apellido1;
          $_SESSION['apellido2'] = $apellido2;
          $_SESSION['nif'] = $nif;
          $_SESSION['telefono'] = $telefono;
          $_SESSION['provincia'] = $provincia;
          $_SESSION['poblacion'] = $poblacion;
          $_SESSION['direccion'] = $direccion;
            
            //establecemos la conexion con la BD
          $db or
              die("Connection failed: ");
    
          $token = Time();
          $tel = intval($telefono);
          //hasheo de la clave
          $passHash = hash('md5', $pass);
          //echo $passHash;
          $sql = "UPDATE usuarios SET Usuario_nombre = '".$nombre."',Usuario_apellido1='".$apellido1."',Usuario_apellido2='".$apellido2."',Usuario_nick='".$nick."',Usuario_clave='".$passHash."',Usuario_email='".$email."',Usuario_domicilio='".$direccion."',Usuario_poblacion='".$poblacion."',Usuario_provincia='".$provincia."',Usuario_nif='".$nif."',Usuario_numero_telefono=".$tel." WHERE Usuario_email = '".$email."'";
          //password_hash($password, PASSWORD_DEFAULT); Usuario_fotografia`=[value-20]
          mysqli_query($db,$sql)
          or die("Problemas en el update".mysqli_error($db));
          mysqli_close($db);
        
         
        
         
    ?>



</body>
</html>