<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Panel de configuración de usario</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css'><link rel="stylesheet" href="assets/css/perfilUsuario.css">

</head>
<body>
<!-- partial:index.partial.html -->
<?php session_start();?>
<div class="contact" id="contact">
  <div class="container">
    <div class="col-md-offset-1 col-md-10">
      <h2><?php echo $_SESSION['usuario']; ?><i class="fa fa-user"></i></h2>
      
    </div>
    <form method="post" action="cambiarPerfil.php" name="contactform" id="contactform">
      <div class="col-md-offset-1 col-md-3">
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
          <input name="email" type="text" id="email" size="30" value="<?php echo $_SESSION['email']; ?>">
          <br>
          <input name="nick" type="text" id="nick" size="30" value="<?php echo $_SESSION['usuario']; ?>">
          <br>
          <input name="pass" type="text" id="pass" size="30" value="<?php echo $_SESSION['password']; ?>">
          <br>
          
        </fieldset>
      </div>
      <div class="col-md-7">
        <fieldset>
        <input name="provincia" type="text" id="provincia" size="30" placeholder="Provincia">
          <br>
          <input name="poblacion" type="text" id="poblacion" size="30" placeholder="Población">
          <br>
          <input name="direccion" type="text" id="direccion" size="30" placeholder="Dirección">
          <br>
                    <div class="pac-card" id="pac-card">
            <div>
              
              <div id="type-selector" class="pac-controls">
                <input type="radio" name="type" id="changetype-all" checked="checked" hidden>
                
              </div>
              
            </div>
            <div id="pac-container">
              <input id="pac-input" type="text"
                  placeholder="Enter a location">
            </div>
          </div>
          <div id="map-canvas"></div>
          <div id="infowindow-content">
            <img src="" width="12" height="12" id="place-icon">
            <span id="place-name"  class="title"></span><br>
            <span id="place-address"></span>
          </div>

          
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAsbZh-OJcjNt9NIcfeXFUImyjBYovmdE&libraries=places&callback=initMap"
        async defer></script>

<!-- partial -->
  <script  src="assets/js/perfilUsuario.js"></script>

</body>
</html>