<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Log in/Registro</title>
  <link rel="stylesheet" href="assets/css/logIn.css">
</head>
<body>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

<div class="container">
  <div class="frame">
    <div class="nav">
      <ul class"links">
        <li class="signin-active"><a class="btn">Log in</a></li>
        <li class="signup-inactive"><a class="btn">Registrarse</a></li>
      </ul>
    </div>
    <div ng-app ng-init="checked = false">
            <form class="form-signin" action="sigIn.php" method="post" name="form">
          <label for="username">Nick</label>
          <input class="form-styling" type="text" name="username" placeholder=""/>
          <label for="password">Contraseña</label>
          <input class="form-styling" type="text" name="password" placeholder=""/>
          <input type="checkbox" id="checkbox"/>
          <label for="checkbox" ><span class="ui"></span>Mantenerme loggeado</label>
          <div class="btn-animate">
            <a class="btn-signin">Log in</a>
          </div>
				        </form>
        
				        <form class="form-signup" action="#sectionSignUp" method="post" name="form">
          <label for="nombre">Nick</label>
          <input class="form-styling" type="text" name="nombre" placeholder=""/>
          <label for="email">Email</label>
          <input class="form-styling" type="text" name="email" placeholder=""/>
          <label for="password">Contraseña</label>
          <input class="form-styling" type="text" name="password" placeholder=""/>
          <label for="confirmpassword">Confirmar contraseña</label>
          <input class="form-styling" type="text" name="confirmpassword" placeholder=""/>
          <button ng-click="checked = !checked" class="btn-signup" type="submit">Registrarse</button>
				        </form>
      
            <div  class="success">
              <svg width="270" height="270" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
       viewBox="0 0 60 60" id="check" ng-class="checked ? 'checked' : ''">
                 <path fill="#ffffff" d="M40.61,23.03L26.67,36.97L13.495,23.788c-1.146-1.147-1.359-2.936-0.504-4.314
                  c3.894-6.28,11.169-10.243,19.283-9.348c9.258,1.021,16.694,8.542,17.622,17.81c1.232,12.295-8.683,22.607-20.849,22.042
                  c-9.9-0.46-18.128-8.344-18.972-18.218c-0.292-3.416,0.276-6.673,1.51-9.578" />
                <div class="successtext">
                   <p> ¡Gracias por registrarte! Comprueba tu email para la confirmación de la cuenta.</p>
                </div>
             </div>
      </div>
      
      <div class="forgot">
        <a href="#">¿Has olvidado tu contraseña?</a>
      </div>
      
      <div>
        <div class="cover-photo"></div>
        <div class="profile-photo"></div>
        <h1 class="welcome">Bienvenido</h1>
        <a class="btn-goback" value="Refresh" onClick="history.go()">Volver</a>
      </div>
  </div>
    
  <a id="refresh" value="Refresh" onClick="history.go()">
    <svg class="refreshicon"   version="1.1" id="Capa_1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         width="25px" height="25px" viewBox="0 0 322.447 322.447" style="enable-background:new 0 0 322.447 322.447;"
         xml:space="preserve">
         <path  d="M321.832,230.327c-2.133-6.565-9.184-10.154-15.75-8.025l-16.254,5.281C299.785,206.991,305,184.347,305,161.224
                c0-84.089-68.41-152.5-152.5-152.5C68.411,8.724,0,77.135,0,161.224s68.411,152.5,152.5,152.5c6.903,0,12.5-5.597,12.5-12.5
                c0-6.902-5.597-12.5-12.5-12.5c-70.304,0-127.5-57.195-127.5-127.5c0-70.304,57.196-127.5,127.5-127.5
                c70.305,0,127.5,57.196,127.5,127.5c0,19.372-4.371,38.337-12.723,55.568l-5.553-17.096c-2.133-6.564-9.186-10.156-15.75-8.025
                c-6.566,2.134-10.16,9.186-8.027,15.751l14.74,45.368c1.715,5.283,6.615,8.642,11.885,8.642c1.279,0,2.582-0.198,3.865-0.614
                l45.369-14.738C320.371,243.946,323.965,236.895,321.832,230.327z"/>
    </svg>
  </a>
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>
<script  src="assets/js/signUp.js"></script>

<section id="sectionSignUp">
<?php

$conexion = mysqli_connect("localhost","root","","diw") or
die("Problemas con la conexión");

function signUp(){
    //valores recibidos del formulario
    $nombre = $_REQUEST[nombre];
    $nick = $_REQUEST[username];
    $email = $_REQUEST[email];
    $password = $_REQUEST[password];

    $seed = Time();
    $token = md5($seed);

    //hasheo de la clave
    $password = hash($token, $password);
    echo $password;

}



//password_hash($password, PASSWORD_DEFAULT);
/*mysqli_query($conexion,"insert into usuarios(Usuario_nombre,Usuario_nick,Usuario_nick,Usuario_email,Usuario_clave,Usuario_token_aleatorio) values 
                   ('','',, '$nom')")
  or die("Problemas en el select".mysqli_error($conexion));
  mysqli_close($conexion);
*/
?>
</section>



</body>
</html>