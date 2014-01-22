<?php
	class Evento {

		private $id;
		private $usrMail;
		private $titulo;
		private $rubro;
		private $fecha;
		private $ciudad;
		private $direccion;
		private $latitud;
		private $longitud;
		private $imagenPath;

		public function __construct($id, $usrMail, $titulo, $rubro, $fecha, $ciudad, $direccion, $latitud, $longitud) {
			$this->id = $id;
			$this->usrMail = $usrMail;
			$this->titulo = $titulo;
			$this->rubro = $rubro;
			$this->fecha = $fecha;
			$this->ciudad = $ciudad;
			$this->direccion = $direccion;
			$this->latitud = $latitud;
			$this->longitud = $longitud;
		}

		public function getId() {
			return $this->id;
		}

		public function getUsrMail() {
			return $this->usrMail;
		}

		public function getLatitud() {
			return $this->latitud;
		}

		public function setLatitud($latitud) {
			$this->latitud = $latitud;
		}

		public function getLongitud() {
			return $this->longitud;
		}

		public function setLongitud() {
			$this->longitud = $longitud;
		}

		public function getTitulo() {
			return $this->titulo;
		}

		public function setTitulo($newTitulo) {
			$this->titulo = $newTitulo;
		}

		public function getRubro() {
			return $this->rubro;
		}

		public function setRubro($newRubro) {
			$this->rubro = $newRubro;
		}

		public function getFecha() {
			return $this->fecha;
		}

		public function setFecha($newFecha) {
			$this->fecha = $newFecha;
		}

		public function getCiudad() {
			return $this->ciudad;
		}

		public function setCiudad($newCiudad) {
			$this->ciudad = $newCiudad;
		}

		public function getDireccion() {
			return $this->direccion;
		}

		public function setDireccion($newDireccion) {
			$this->direccion = $newDireccion;
		}

		public function getImagenPath() {
			return $this->imagenPath;
		}

		public function setImagenPath($newImagenPath) {
			$this->imagenPath = $newImagenPath;
		}

	}
?>