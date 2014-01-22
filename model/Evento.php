<?php
	class Evento {

		private $id;
		private $usrMail;
		private $titulo;
		private $rubro;
		private $fecha;
		private $ciudad;
		private $direccion;
		private $imagenPath;

		public function __construct($id, $usrMail, $titulo, $rubro, $fecha, $ciudad, $direccion) {
			$this->id = $id;
			$this->usrMail = $usrMail;
			$this->titulo = $titulo;
			$this->rubro = $rubro;
			$this->fecha = $fecha;
			$this->ciudad = $ciudad;
			$this->direccion = $direccion;
		}

		public function getId() {
			return $this->id;
		}

		public function getUsrMail() {
			return $this->usrMail;
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