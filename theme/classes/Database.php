<?php

class Database {
	private $conn;
	private $error = "";

	public function __construct($dbHost = DB_HOST, $dbUser = DB_USER, $dbPass = DB_PASS, $dbName = DB_NAME) {
		$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
		if(!$conn) {
			if(!$conn){
				echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
				echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
				exit;
			}	
		}
		$conn->query("SET NAMES utf8");
		
		$this->conn = $conn;
	}
	
	public function select($query, array $args = array()) {
		$c = substr_count($query,"?");
		if(count($args) != $c) {
			$this->error = "Parameter count (".count($args).") does not match the number of requested parameters by query (".$c.")";
			trigger_error($this->error);
			return false;
		}
		
		if ($stmt = $this->conn->prepare($query)) {
			if(count($args) != 0) {
				$params = [];
				$types = array_reduce($args, function ($string, $arg) use (&$params) {
					$params[] = &$arg;
					if (is_float($arg))         $string .= 'd';
					elseif (is_integer($arg))   $string .= 'i';
					elseif (is_string($arg))    $string .= 's';
					else                        $string .= 'b';
					return $string;
				}, '');
				array_unshift($params, $types);
				
				call_user_func_array([$stmt, 'bind_param'], $params);
			}
			
			if(!$stmt->execute()) {
				$this->error = $stmt->error;
				trigger_error($this->error);
				return false;
			}
			$result = $stmt->get_result();
			
			$stmt->close();
			
		} else {
			$this->error = $this->conn->error;
			trigger_error($this->error);
			return false;
		}
		
		if (strpos(strtolower($query), 'select') !== false) {
			$resultArray = array();
			while ($row = $result->fetch_row()) {
				array_push($resultArray,$row);
			}
			
			return $resultArray;
		};
		return true;
	}
	
	public function query($query, array $args = array()) {
		return $this->select($query, $args);
	}
	
	public function getError() { // returns last error
		echo $this->error;
	}
	
	public function getInsertId() {
		return $this->conn->insert_id;
	}
}
?>