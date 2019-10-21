<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Panel de configuración del usuario</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="assets/css/perfilUsuario.css">
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="wrapper">
    <div class="container">
        <header>
            <h1>Configuración</h1>
        </header>
        <section>
            <div class="form">
                <div class="input-item">
                    <div class="label-part">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="input-part">
                        <input type="text" autocomplete="off" id="nombre" value="Menganito" placeholder="Tu nombre, el de verdad." onfocus="this.value = this.value;" />
                    </div>
				</div>
                <div class="input-item">
                    <div class="label-part">
                        <label for="apellido1">Primer apellido</label>
                    </div>
                    <div class="input-part">
                        <input type="text" autocomplete="off" id="apellido1"  placeholder="Tu primer apellido." />
                    </div>
                </div>
                <div class="input-item">
                    <div class="label-part">
                        <label for="apellido2">Segundo apellido</label>
                    </div>
                    <div class="input-part">
                        <input type="text" autocomplete="off" id="apellido2" placeholder="Sí, tu segundo apellido también." />
                    </div>
                </div>
                <div class="input-item">
                    <div class="label-part">
                        <label for="nif">NIF</label>
                    </div>
                    <div class="input-part">
                        <input type="text" id="nif" placeholder="Por favor, que no sea ‘12345678A’" />
                        <span>9 caracteres</span>
                    </div>
                </div>
                <div class="input-item">
                    <div class="label-part">
                        <label for="telefono">Número de teléfono</label>
                    </div>
                    <div class="input-part">
                        <input type="text" autocomplete="off" id="telefono" placeholder="Te aseguro que no es para chatear." />
                    </div>
				</div>
				<div class="input-item">
                    <div class="label-part">
                        <label for="perfil">Perfil</label>
                    </div>
                    <div class="input-part">
                        <input type="text" autocomplete="off" id="perfil" placeholder="De momento no sé ni qué es." />
                    </div>
				</div>
				<div class="input-item">
                    <div class="label-part">
                        <label for="provincia">Provincia</label>
                    </div>
                    <div class="input-part">
                        <input type="text" autocomplete="off" id="provincia" placeholder="" />
                    </div>
				</div>
				<div class="input-item">
                    <div class="label-part">
                        <label for="poblacion">Población</label>
                    </div>
                    <div class="input-part">
                        <input type="text" autocomplete="off" id="plobacion" placeholder="La hermosa localidad en la que vives." />
                    </div>
				</div>
				<div id="map"></div>
				<script>
					var map;
					function initMap() {
						map = new google.maps.Map(document.getElementById('map'), {
						center: {lat: -34.397, lng: 150.644},
						zoom: 8
						});
					}
					</script>
					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOqoVjFL8zuvtO7rx3Q2Dd_owvhOOkxh4&callback=initMap"
					async defer></script>
				</div>
				<div class="change-image">
					<div class="profile-img-container">
						<a href="javascript:;">Añadir imagen</a>
						<img src="https://s3.postimg.org/jmp5z872n/profile_image.jpg" class="profile" alt="" />
					</div>
					<div class="edit">
						<a href="javascript:;" class="remove"><img src="https://s10.postimg.org/6ayr9sjj9/image.png" alt="" /></a>
						<a href="javascript:;" class="rotate"><img src="https://s10.postimg.org/ywimyp3ad/rotate.png" alt="" /></a>
					</div>
				</div>
			
        </section>
        <footer>
            <a href="javascript:;" class="cancel"><span>&larr;</span> Cancelar</a>
        <a href="javascript:;" class="save">Guardar <span>&rarr;</span></a>
        </footer>
    </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://rawgit.com/fronteed/icheck/1.x/icheck.min.js'></script><script  src="assets/js/perfilUsuario.js"></script>

</body>
</html>