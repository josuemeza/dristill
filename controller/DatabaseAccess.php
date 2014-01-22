<?php

	class DatabaseAccess {

		private $HOST = 'localhost';
		private $DB_USER = 'root';
		private $DB_PASS = 'root';
		private $DATABASE = 'hito3';

		public function __construct() {}

		public function insert($table, $columns, $values) {
			$query = 'INSERT INTO ' . $table . '(' . implode(',', $columns) . ') VALUES(' . implode(',', $values) . ');';
			$connect = mysql_connect($this->HOST, $this->DB_USER, $this->DB_PASS);
			mysql_select_db($this->DATABASE);
			$response = mysql_query($query);
			mysql_close($connect);
			return $response;
		}

		public function select($table, $columns, $selectors){
			$query = 'SELECT ' . implode(',', $columns) . ' FROM ' . $table . ($selectors!='' ? " WHERE " . $selectors . ';' : ';');
			$connect = mysql_connect($this->HOST, $this->DB_USER, $this->DB_PASS);
			mysql_select_db($this->DATABASE);
			$response = mysql_query($query);
			$rows = array();
			while($row = mysql_fetch_assoc($response)) array_push($rows, $row);
			mysql_close($connect);
			return array('rows_count' => mysql_num_rows($response), 'rows' => $rows);
		}

		public function update($table, $sets, $selectors) {
			$query = "UPDATE " . $table . " SET " . $sets . " WHERE " . $selectors . ";";
			$connect = mysql_connect($this->HOST, $this->DB_USER, $this->DB_PASS);
			mysql_select_db($this->DATABASE);
			$response = mysql_query($query);
			mysql_close($connect);
			return $response;
		}

	}

?>