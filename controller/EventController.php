<?php
	$root = '../';
	include('conexion.php');
	include($root.'model/Evento.php');

	class EventController {

		private $dbAccess;

		public function __construct(){
			$this->dbAccess = new DatabaseAccess();
		}

		public function request($post, $files) {
			switch($post['action']) {
				case "crear":
					$this->addEvent($post['correo'], $post['rubro'], $post['nombre'], $post['direccion'], $post['ciudad'], $post['fecha'], $post['longitud'], $post['latitud'], $files['file_data']['tmp_name'], $files['file_data']['size']);
					break;
			}
		}

		public function getMyEvents($mail) {
			$result = $this->dbAccess->select('Eventos', array("Nombre", "Direccion", "Ciudad", "Fecha"), "Email='" . $mail . "'", "Fecha DESC", "");
			$events = array();
			foreach ($result['rows'] as $value)
				array_push($events, new Evento("", "", $value['Nombre'], "", $value['Fecha'], $value['Ciudad'], $value['Direccion']));
			return $events;
		}

		public function getTop10() {
			$result = $this->dbAccess->select('Eventos', array("id", "Email", "Nombre", "Rubro", "Fecha"), "", "Fecha ASC", "10");
			$events = array();
			foreach ($result['rows'] as $value)
				array_push($events, new Evento($value['id'], $value['Email'], $value['Nombre'], $value['Rubro'], $value['Fecha'], $value['Ciudad'], $value['Direccion']));
			return $events;
		}

		public function getHistoryEvents() {
			$result = $this->dbAccess->select('Eventos', array("Nombre", "Direccion", "Ciudad", "Fecha"), "", "Fecha ASC", "");
			$events = array();
			foreach ($result['rows'] as $value)
				array_push($events, new Evento("", "", $value['Nombre'], "", $value['Fecha'], $value['Ciudad'], $value['Direccion']));
			return $events;
		}

		private function addEvent($usrMail, $rubro, $nombre, $direccion, $ciudad, $fecha, $latitud, $longitud, $fileTempName, $fileSize) {
			$fp = fopen($fileTempName, "rb");
			$imagen = fread($fp, $fileSize);
			$imagen = addslashes($imagen);
			fclose($fp);
			$result = $this->dbAccess->insert('Eventos', array("Email", "Rubro", "Nombre", "Direccion", "Ciudad", "Fecha", "Latitud", "Longitud", "imagen"), array("'".$usrMail."'", "'".$rubro."'", "'".$nombre."'", "'".$direccion."'", "'".$ciudad."'", "'".$fecha."'", "'".$latitud."'", "'".$longitud."'", "'".$imagen."'"));
			if($result) {
				header('Location: ../views/evento-completo.php');
			} else {
				header('Location: ../views/evento-error.php');
			}
		}

		public function printImage($get) {
			$result = $this->dbAccess->select('Eventos', array('imagen'), "id='" . $get['id'] . "' AND Email='" . $get['mail'] . "'", "", "");
			header("Content-type: image/gif");
			echo $result['rows'][0]['imagen'];
		}

	}

	$eventController = new EventController();
	if($_POST) {
		$eventController->request($_POST, $_FILES);
	} else if($_GET) {
		$eventController->printImage($_GET);
	}

?>