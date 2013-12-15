<?php 
	$root = '../';
	$titulo = 'Dristill - Inicio';
	$nav_elements = NULL;
	$nav_active = "inicio";
	session_start();
	if (!$_SESSION['loguser']) $nav_elements = array("inicio", "perfil", "registro", "login");
	else $nav_elements = array("inicio", "perfil", "registro", "logout");
	//session_destroy();
	include($root.'app/events.php');
	include($root.'assets/html/header.php');
?>

<!-- Scripts -->
<script type="text/javascript" src="<?php echo $root;?>scripts/index.js"></script>

<div id="top-events" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<?php $i = 0; foreach($top_events as $e) {?>
			<li data-target="#top-events" data-slide-to="<?php echo $i;?>" class="<?php echo $i==0 ? 'active' : '';?>"></li>
		<?php $i++; }?>
	</ol>
	<div class="carousel-inner">
		<?php $i = 0; foreach($top_events as $e) {?>
			<div class="item <?php echo $i==0 ? 'active' : '';?>">
				<!--img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt=":)"/-->
				<img src="<?php echo $root;?>assets/img/eventos/<?php echo $e->getImagenPath();?>" class="img-responsive" alt=":)"/>
				<div class="container">
					<div class="carousel-caption">
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
			</div>
		<?php $i = 1; }?>
	</div>
	<a class="left carousel-control" href="#top-events" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
	<a class="right carousel-control" href="#top-events" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div><!-- carousel -->

<section class="container">
	<!-- Historial de eventos -->
	<article class="row">
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
	</article>

	<!-- About - Quienes somos y login -->
	<article class="row">
		<div class="col-md-6 col-md-offset-1">
			<h2>Somos una empresa cachilupi</h2>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div>
		<div id="login" class="col-md-3 col-md-offset-1" <?php echo $_SESSION['loguser'] ? 'style="display: none;"' : '';?>>
			<h2>Eres usuario?</h2>
			<form class="form-signin" role="form" action="<?php echo $root;?>views/perfil.php" method="POST">
				<input type="text" class="form-control" placeholder="nombre de usuario">
				<input type="password" class="form-control" placeholder="contraseña">
				<label for="recordarme" class="checkbox">
					<input id="recordarme" name="recordarme" type="checkbox" value="remember-me"> Recordar esta cuenta
				</label>
				<div class="text-right">
					<button class="btn btn-default btn-lg" type="button">Regístrate</button>
					<button class="btn btn-primary btn-lg" type="submit">Entrar</button>
				</div>
			</form>
		</div>
	</article>
</section>

<?php include($root.'assets/html/footer.php');?>