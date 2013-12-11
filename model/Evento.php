<?php
	class Evento {

		private $titulo;
		private $rubro;
		private $fecha;
		private $ciudad;
		private $direccion;
		private $imagenPath;

		function __construct($titulo, $rubro, $fecha, $ciudad, $direccion, $imagenPath) {
			$this->titulo = $titulo;
			$this->rubro = $rubro;
			$this->fecha = $fecha;
			$this->ciudad = $ciudad;
			$this->direccion = $direccion;
			$this->imagenPath = $imagenPath;
		}

		function getTitulo() {
			return $this->titulo;
		}

		function setTitulo($newTitulo) {
			$this->titulo = $newTitulo;
		}

		function getRubro() {
			return $this->rubro;
		}

		function setRubro($newRubro) {
			$this->rubro = $newRubro;
		}

		function getFecha() {
			return $this->fecha;
		}

		function setFecha($newFecha) {
			$this->fecha = $newFecha;
		}

		function getCiudad() {
			return $this->ciudad;
		}

		function setCiudad($newCiudad) {
			$this->ciudad = $newCiudad;
		}

		function getDireccion() {
			return $this->direccion;
		}

		function setDireccion($newDireccion) {
			$this->direccion = $newDireccion;
		}

		function getImagenPath() {
			return $this->imagenPath;
		}

		function setImagenPath($newImagenPath) {
			$this->imagenPath = $newImagenPath;
		}

	}
?>