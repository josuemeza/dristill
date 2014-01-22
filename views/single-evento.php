<?php 
	$root = '../';
	$titulo = 'Dristill - Evento';
	$nav_elements = NULL;
	$nav_active = "";
	session_start();
	if (!$_SESSION['loguser']) $nav_elements = array("inicio", "registro", "login");
	else $nav_elements = array("inicio", "perfil", "logout");
	include($root.'controller/EventController.php');
	include($root.'assets/html/header.php');
	$event = $eventController->getEventData($_GET['id'], $_GET['mail']);
?>

<!-- Scripts -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoETs6fOtsJWCmk46mq2f6o3eM8clWEOA&sensor=true"></script>
<script type="text/javascript">
	// Marca en mapa
	function initialize() {
		var mapOptions = {
			center: new google.maps.LatLng(<?php echo $event->getLatitud();?>,<?php echo $event->getLongitud();?>),
			zoom: 15
		};
		var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(<?php echo $event->getLatitud();?>,<?php echo $event->getLongitud();?>),
			title: <?php echo "'" . $event->getTitulo() . "'";?>
		});
		marker.setMap(map);
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>

<section class="container no-slider">
	<article class="row">
		<div class="col-md-10 col-md-offset-2">
			<h2 class="col-md-12"><?php echo $event->getTitulo();?></h2>
			<div class="col-md-8">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="imagen" class="col-md-3 control-label">Imagen</label>
						<div class="col-md-9">
							<img style="width: 100%;" src="<?php echo $root.'controller/EventController.php?action=printImage&id='.$event->getId().'&mail='.$event->getUsrMail();?>" alt=":)"/>
						</div>
					</div>
					<div class="form-group">
						<label for="mail" class="col-md-3 control-label">Creador</label>
						<div class="col-md-9">
							<input id="mail" name="mail" data-label="Creador" type="text" value="<?php echo $event->getUsrMail();?>" class="form-control" disabled/>
						</div>
					</div>
					<div class="form-group">
						<label for="rubro" class="col-md-3 control-label">Rubro</label>
						<div class="col-md-9">
							<input id="rubro" name="rubro" data-label="Rubro" type="text" value="<?php echo $event->getRubro();?>" class="form-control" disabled/>
						</div>
					</div>
					<div class="form-group">
						<label for="direccion" class="col-md-3 control-label">Dirección</label>
						<div class="col-md-9">
							<input id="direccion" name="direccion" data-label="Dirección" type="text" value="<?php echo $event->getDireccion();?>" class="form-control" disabled/>
						</div>
					</div>
					<div class="form-group">
						<label for="ciudad" class="col-md-3 control-label">Ciudad</label>
						<div class="col-md-9">
							<input id="ciudad" name="ciudad" data-label="Ciudad" type="text" value="<?php echo $event->getCiudad();?>" class="form-control" disabled/>
						</div>
					</div>
					<div class="form-group">
						<label for="fecha" class="col-md-3 control-label">Fecha</label>
						<div class="col-md-9">
							<input id="fecha" name="fecha" data-label="Fecha" type="text" value="<?php echo $event->getFecha();?>" class="form-control" disabled/>
						</div>
					</div>
					<div class="form-group">
						<label for="mapa" class="col-md-3 control-label">Mapa</label>
						<div class="col-md-9">
							<div id="map-canvas"></div>
						</div>
					</div>
					<div class="text-right">
						<button onClick="history.back()" class="clean btn btn-default" type="button">Regresar</button>
					</div>
				</form>
			</div>
		</div>
	</article>
</section>

<?php include($root.'assets/html/footer.php');?>