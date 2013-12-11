<?php 
	$root = '../';
	$titulo = 'Dristill - Inicio';
	$nav_elements = NULL;
	$nav_active = "inicio";
	session_start();
	if (!$_SESSION['loguser']) $nav_elements = array("inicio", "registro", "perfil", "login");
	else $nav_elements = array("inicio", "registro", "perfil", "logout");
	//session_destroy();
	include($root.'app/events.php');
	include($root.'assets/html/header.php');
?>

<!-- Scripts -->
<script type="text/javascript" src="<?php echo $root;?>scripts/index.js"></script>

<!-- header -->
<header class="row">
	<h1>Dristill S.A <small>Siempre hay un lugar para carretear ;)</small></h1>
</header>

<!-- Eventos recientes -->
<div class="row">
	<div class="col-md-12">
		<h2>Eventos Recientes</h2>
		<div id="slider-recientes" class="liquid-slider">
			<?php foreach($top_events as $e) {?>
				<div class="evento">
					<span class="title">●</span>
					<div class="img-content">
						<img src="<?php echo $root;?>assets/img/<?php echo $e->getImagenPath();?>" class="img-rounded" height="352" width="352" alt=":)" />
					</div>
					<div class="text-content">
						<h2>
							<?php echo $e->getTitulo();?>
						</h2>
						<p>
							<strong>Rubro:</strong>
							<span>
								<?php echo $e->getRubro();?>
							</span>
						</p>
						<p>
							<strong>Fecha del evento:</strong>
							<span>
								<?php echo $e->getFecha();?>
							</span>
						</p>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
</div>

<!-- Historial de eventos -->
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<h2>Historial de eventos</h2>
		<table id="history-events" class="table table-striped table-hover">
			<thead>
				<tr>
					<th class="table-col-1">Fecha</th>
					<th class="table-col-2">Nombre</th>
					<th class="table-col-3">Dirección</th>
					<th class="table-col-4">Ciudad</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($history_events as $e) {?>
					<tr>
						<td>
							<?php echo $e->getFecha();?>
						</td>
						<td>
							<a href="#">
								<?php echo $e->getTitulo();?>
							</a>
						</td>
						<td>
							<?php echo $e->getDireccion();?>
						</td>
						<td>
							<?php echo $e->getCiudad();?>
						</td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div>

<!-- About - Quienes somos y login -->
<div class="row">
	<div class="col-md-6 col-md-offset-1">
		<h2>Somos una empresa cachilupi</h2>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
	</div>
	<div id="login" class="col-md-3 col-md-offset-1" <?php echo $_SESSION['loguser'] ? 'style="display: none;"' : '';?>>
		<h2>Eres usuario?</h2>
		<form class="form-signin" role="form">
			<input type="text" class="form-control" placeholder="nombre de usuario">
			<input type="password" class="form-control" placeholder="contraseña">
			<label class="checkbox">
				<input type="checkbox" value="remember-me"> Recordar esta cuenta
			</label>
			<div class="text-right">
				<button class="btn btn-default" type="button">Regístrate</button>
				<button class="btn btn-primary" type="submit">Entrar</button>
			</div>
		</form>
	</div>
</div>

<?php include($root.'assets/html/footer.php');?>