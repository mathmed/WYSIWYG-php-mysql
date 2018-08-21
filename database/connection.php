<?php

	include "config.php";

	/* this class is responsible for connecting to your database */
	class Connection {
        
        /* class attributes */
		private $hostname = DB_HOSTNAME;
		private $username = DB_USERNAME;
		private $password = DB_PASSWORD;
		private $database = DB_DATABASE;
		private $prefix = DB_PREFIX;
		private $charset = DB_CHARSET;

        /* function to connect to your database */
		private function connect() {

			/* trying to start a connection */
			try{
				
				$connect = new PDO("mysql:host=".$this->hostname.";dbname=".$this->database.";charset=".$this->charset, $this->username, $this->password);
				$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $connect;
			
			}catch(PDOException $e){
				echo "Error" . $e;
			}
		}

        /* function to receive a register from database */
		public function insert($table, $fields, $val, $condition, $quantity){

			/* starting a connection */			
			$connect = $this->connect();

			/* starting a query */
			$query = "INSERT INTO $table $fields VALUES $quantity $condition";

			/* preparing the query */
			$stmt = $connect->prepare($query);

			/* binding the parameters */
			$cont = 1;
			foreach($val as $key => $value){
				$stmt->bindParam($cont, $value['param'], $value['type']);
				$cont++;	
			}
			/* running the query */
            $stmt->execute();
            
			/* closing the connection */
			$connect = null;
		}

		/* function to delete a register from database */

		public function delete($table, $val, $condition){
			/* starting a connection */			
			$connect = $this->connect();

			/* starting the query */
			$query = "DELETE FROM $table WHERE $condition";

			/* preparing the query */
			$stmt = $connect->prepare($query);

			/* binding the parameters */
			$cont = 1;
			foreach($val as $key => $value){
				$stmt->bindParam($cont, $value['param'], $value['type']);
				$cont++;	
			}

			/* running the query */
			$stmt->execute();
			/* closing the connection */
			$conexao = null;
		}
	}

?>
