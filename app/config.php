<?php
	function get_path() {
		$path = split('/', $_SERVER['PHP_SELF']);
		array_pop($path);
		$path = implode('/', $path) . '/';
		return $path;
	}

	$root = $_SERVER['DOCUMENT_ROOT'];
	$path = get_path();
?>