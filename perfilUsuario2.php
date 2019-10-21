<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Panel de configuración de usario</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css'><link rel="stylesheet" href="assets/css/perfilUsuario2.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="contact" id="contact">
  <div class="container">
    <div class="col-md-offset-1 col-md-10">
      <h2><?php echo $_SESSION['usuario']; ?><i class="fa fa-user"></i></h2>
      
    </div>
    <form method="post" action="cambiarPerfil.php" name="contactform" id="contactform">
      <div class="col-md-offset-1 col-md-5">
        <fieldset>
          <input name="nombre" type="text" id="nombre" size="30" placeholder="Nombre">
          <br>
          <input name="apellido1" type="text" id="apellido1" size="30" placeholder="Primer apellido">
          <br>
          <input name="apellido2" type="text" id="apellido2" size="30" placeholder="Segundo apellido">
          <br>
          <input name="nif" type="text" id="nif" size="30" placeholder="DNI (12345678A)">
          <br>
          <input name="telefono" type="text" id="telefono" size="30" placeholder="Teléfono">
          <br>
          <input name="provincia" type="text" id="provincia" size="30" placeholder="Provincia">
          <br>
          <input name="poblacion" type="text" id="poblacion" size="30" placeholder="Poblacion">
          <br>
          
        </fieldset>
      </div>
      <div class="col-md-5">
        <fieldset>
        <input name="email" type="text" id="email" size="30" value="<?php echo $_SESSION['email']; ?>">
          <br>
          <input name="nick" type="text" id="nick" size="30" value="<?php echo $_SESSION['usuario']; ?>">
          <br>
          <input name="pass" type="text" id="pass" size="30" value="<?php echo $_SESSION['pass']; ?>">
          <br>
          <div id="map-canvas"></div>
        </fieldset>
      </div>
      <div class="col-md-offset-1 col-md-10">
        <fieldset>
          <button type="submit" class="btn btn-lg" id="submit" value="Submit">Guardar</button>
        </fieldset>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOqoVjFL8zuvtO7rx3Q2Dd_owvhOOkxh4&callback=initMap"
      async defer></script>
<!-- partial -->
  <script  src="assets/js/perfilUsuario2.js"></script>

</body>
</html>