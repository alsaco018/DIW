<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Reactivación</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Neuton|Oswald'>
<link rel="stylesheet" href="assets/css/signUp.css"><script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<p>
  Tu cuenta ha sido reactivada
  <span>
    GRACIAS
  </span>
  &mdash; ya puedes iniciar sesión &mdash;
</p>
<!-- partial -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <?php
    include('dbConfig.php');
    start_session();
          $nick = ($_GET['nick']);
          
            //borramos <?php echo ';?' de las variables
          $nick = str_replace("<?php echo ","",$nick);
          $nick = str_replace(";?>","",$nick);
          
            //establecemos la conexion con la BD
          $db or
              die("Connection failed: ");
    
          $token = Time();
          
          $sql = "UPDATE usuarios SET Usuario_bloqueado=0, Usuario_numero_intentos=0, Usuario_token_aleatorio='".$token." WHERE Usuario_nick = '".$nick."'";
          mysqli_query($db,$sql)
          or die("Problemas en el update".mysqli_error($db));
          mysqli_close($db);
        
         
        
         
    ?>



</body>
</html>