<?php

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="cache-control" content="no-store, no-cache, must-revalidate">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="expires" content="0">

	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css">
</head>
</head>

<body>

	<section class="titulosPage">
		<h2>INGRESO AL SISTEMA ECOLAC</h2>
		<hr>
		<h5>Verifique que sus datos sean correctos para el ingreso</h5>
	</section>
	<section class="serviciosCards">
		<script>
			history.pushState(null, null, document.URL);
			window.addEventListener('popstate', function () {
				history.pushState(null, null, document.URL);
			});
		</script>

		<article class="itemCard">
			<img src="./images/ECOLACLOGO.png">
			<h3>INGRESAR AL SISTEMA</h3>
			<form action="validar.php" method="post">
				<div class="grupoInput">
					<label class="form-label" for="usuario">Usuario</label>
					<input class="caja" type="text" name="usuario" placeholder="Ingrese su usuario" required>
				</div>
				<div class="grupoInput">
					<label class="form-label" for="contrasenia">Contraseña</label>
					<input class="caja" type="password" name="contrasenia" placeholder="Ingrese su clave" required>
				</div>
				<button class="btn">INGRESAR</button>
			</form>
		</article>

	</section>
	<footer>
		
					<h3>Nuestra Ubicación</h3>
					<div class="mapouter">
						<div class="gmap_canvas"><iframe width="828" height="250" id="gmap_canvas"
								src="https://maps.google.com/maps?q=ECOLAC&t=&z=17&ie=UTF8&iwloc=&output=embed"
								frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
								href="https://textcaseconvert.com/"></a><br><a href="https://online-timer.me/"></a><br>
							<style>
								.mapouter {
									position: relative;
									text-align: right;
									height: 250px;
									width: 828px;
								}
							</style><a href="https://www.embedmaps.co">create map in google</a>
							<style>
								.gmap_canvas {
									overflow: hidden;
									background: none !important;
									height: 250px;
									width: 828px;
								}
							</style>
						</div>
					</div>
					<h6>Derechos Reservados UTPL 2023</h6>
			
	</footer>
	<!-- cdn de foundation framework -->
	<script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/js/foundation.min.js"></script>
</body>

</html>