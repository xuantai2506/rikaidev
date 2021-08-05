<?php
class DatabaseConnException extends Exception {
	public function __construct($alert,$query) {
		parent::__construct("Database Connection Exception: An error $alert occurred when executing $query.");
	}
}
abstract class DatabaseConnect {

	private static $_getConn = NULL;

	private $_db_host,
			$_db_user,
			$_db_pass,
			$_db_name;

	public $RowCount,
			$LastInsertID,
			$AffectedRows;

	public function __construct($dbHost,$dbUser,$dbPass,$dbName) {
		$this->_db_host = trim($dbHost);
		$this->_db_user = trim($dbUser);
		$this->_db_pass = trim($dbPass);
		$this->_db_name = trim($dbName);
	}

	public function __destruct() {
		$this->disconnect();
	}

	public function connect() {
		if(self::$_getConn===NULL) {
			$conn = @new mysqli($this->_db_host,$this->_db_user,$this->_db_pass,$this->_db_name);
			if(mysqli_connect_errno() !== 0) throw new DatabaseConnException(mysqli_connect_error(),"Can't connect to Database");
			$conn->query("SET NAMES 'utf8mb4'");

			self::$_getConn = $conn;
		}
		return self::$_getConn;
	}

	public function clearText($string = '') {
		$conn = self::connect();
		if($conn!==NULL) {
			$string = $conn->real_escape_string($string);
			return $string;
		}
	}

	public function query($sql) {
		$sql = trim($sql);
		$sql_arr = explode(' ',$sql);

		$conn = self::connect();
		$result = $conn->query($sql);
		if($conn->errno !== 0) throw new DatabaseConnException($conn->error,$sql);

		switch ($sql_arr[0]) {
			case "SELECT":
				$rows = array();
				while( ($row = $result->fetch_assoc())!= NULL ) {
					$rows[] = $row;
				}
				$this->RowCount = $result->num_rows;
				return $rows;
				break;

			case "INSERT":
				$this->LastInsertID = $conn->insert_id;
				break;

			case "UPDATE":
			case "DELETE":
				$this->AffectedRows = $conn->affected_rows;
				break;
		}

		switch ($sql_arr[0]." ".$sql_arr[1]) {
			case "SHOW TABLES":
				$rows = array();
				while( ($row = $result->fetch_assoc())!= NULL ) {
					$rows[] = $row;
				}
				$this->RowCount = $result->num_rows;
				return $rows;
				break;

			case "SHOW TABLE":
				$rows = array();
				while( ($row = $result->fetch_assoc())!= NULL ) {
					$rows[] = $row;
				}
				$this->RowCount = $result->num_rows;
				return $rows;
				break;

			case "SHOW CREATE":
				$rows = array();
				while( ($row = $result->fetch_row())!= NULL ) {
					$rows[] = $row;
				}
				return $rows;
				break;
		}

	}

	public function hostInfo() {
		$conn = self::connect();
		return $conn->host_info;
	}

	public function serverInfo() {
		$conn = self::connect();
		return $conn->server_info;
	}

	public function protoInfo() {
		$conn = self::connect();
		return $conn->protocol_version;
	}

	public function error() {
		$conn = self::connect();
		return $conn->error;
	}

	public function disconnect() {
		$conn = self::connect();
		mysqli_close($conn);
	}
}