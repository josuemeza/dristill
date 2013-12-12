<?php 
	$root = '../';
	$titulo = 'Dristill - Perfil';
	$nav_elements = NULL;
	$nav_active = "perfil";
	/*session_start();
	if (!$_SESSION['loguser']) echo '<script type="text/javascript">window.location="'. $root . 'views/perfil.php"</script>';
	else*/ $nav_elements = array("inicio", "registro", "perfil", "logout");
	include($root.'app/events.php');
	include($root.'assets/html/header.php');
?>

<div class="container no-slider">

</div>

<?php include($root.'assets/html/footer.php');?>