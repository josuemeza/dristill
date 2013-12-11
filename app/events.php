<?php
	include('../model/Evento.php');

	$top_events = array(
		new Evento('Evento A', 'Fiesta', '22/10/2013', '', '', 'imagen1.jpg'),
		new Evento('Evento B', 'Fiesta', '22/10/2013', '', '', 'imagen2.jpg'),
		new Evento('Evento C', 'Fiesta', '22/10/2013', '', '', 'imagen3.jpg'),
		new Evento('Evento D', 'Fiesta', '22/10/2013', '', '', 'imagen3.jpg'),
		new Evento('Evento E', 'Fiesta', '22/10/2013', '', '', 'imagen3.jpg'),
		new Evento('Evento F', 'Fiesta', '22/10/2013', '', '', 'imagen3.jpg'),
		new Evento('Evento G', 'Fiesta', '22/10/2013', '', '', 'imagen3.jpg'),
		new Evento('Evento H', 'Fiesta', '22/10/2013', '', '', 'imagen3.jpg'),
		new Evento('Evento I', 'Fiesta', '22/10/2013', '', '', 'imagen3.jpg'),
		new Evento('Evento J', 'Fiesta', '22/10/2013', '', '', 'imagen3.jpg')
	);

	$history_events = array(
		new Evento('Fiesta A', 'Fiesta', '22/10/2013', 'Valparaíso', 'Avenida Playa Ancha', ''),
		new Evento('Fiesta B', 'Fiesta', '22/10/2013', 'Valparaíso', 'Avenida Playa Ancha', ''),
		new Evento('Fiesta C', 'Fiesta', '22/10/2013', 'Valparaíso', 'Avenida Playa Ancha', '')
	);
?>