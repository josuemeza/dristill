<?php
	$root = '../';
	include('conexion.php');
	include($root.'model/Evento.php');

	class EventController {

		private $dbAccess;

		public function __construct(){
			$this->dbAccess = new DatabaseAccess();
		}

		public function postRequest($post, $files) {
			switch($post['action']) {
				case "crear":
					$this->addEvent($post['correo'], $post['rubro'], $post['nombre'], $post['direccion'], $post['ciudad'], $post['fecha'], $post['latitud'], $post['longitud'], $files['file_data']['tmp_name'], $files['file_data']['size']);
					break;
			}
		}

		public function getMyEvents($mail) {
			$result = $this->dbAccess->select('Eventos', array("id", "Email", "Nombre", "Direccion", "Ciudad", "Fecha"), "Email='" . $mail . "'", "Fecha DESC", "");
			$events = array();
			foreach ($result['rows'] as $value)
				array_push($events, new Evento($value['id'], $value['Email'], $value['Nombre'], "", $value['Fecha'], $value['Ciudad'], $value['Direccion'], 0, 0));
			return $events;
		}

		public function getTop10() {
			$result = $this->dbAccess->select('Eventos', array("id", "Email", "Nombre", "Rubro", "Fecha"), "", "Fecha ASC", "10");
			$events = array();
			foreach ($result['rows'] as $value)
				array_push($events, new Evento($value['id'], $value['Email'], $value['Nombre'], $value['Rubro'], $value['Fecha'], $value['Ciudad'], $value['Direccion'], 0, 0));
			return $events;
		}

		public function getHistoryEvents() {
			$result = $this->dbAccess->select('Eventos', array("id", "Email", "Nombre", "Direccion", "Ciudad", "Fecha"), "", "Fecha ASC", "");
			$events = array();
			foreach ($result['rows'] as $value)
				array_push($events, new Evento($value['id'], $value['Email'], $value['Nombre'], "", $value['Fecha'], $value['Ciudad'], $value['Direccion'], 0, 0));
			return $events;
		}

		public function getEventData($id, $mail) {
			$result = $this->dbAccess->select('Eventos', array("Rubro", "Nombre", "Direccion", "Ciudad", "Fecha", "Latitud", "Longitud"), "id='" . $id . "' AND Email='" . $mail . "'", "", "");
			if($result['rows_count']==1) {
				$value = $result['rows'][0];
				return new Evento($id, $mail, $value['Nombre'], $value['Rubro'], $value['Fecha'], $value['Ciudad'], $value['Direccion'], $value['Latitud'], $value['Longitud']);
			}
			return;
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

		public function getRequest($get) {
			switch($get['action']) {
				case 'printImage':
					$this->printImage($get['id'], $get['mail']);
					break;
			}
		}

		private function printImage($id, $mail) {
			$result = $this->dbAccess->select('Eventos', array('imagen'), "id='" . $id . "' AND Email='" . $mail . "'", "", "");
			header("Content-type: image/gif");
			echo $result['rows'][0]['imagen'];
		}

	}

	$eventController = new EventController();
	if($_POST) {
		$eventController->postRequest($_POST, $_FILES);
	} else if($_GET) {
		$eventController->getRequest($_GET);
	}

?>