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
				
				$connect = new PDO("mysql:host=".$hostname.";dbname=".$database.";charset=".$charset, $username, $password);
				$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $conexao;
			
			}catch(PDOException $e){
				echo "Error" . $e;
			}
		}

        /* function to insert a register in database */
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

		public function receive($table, $fields, $val, $condition){

			/* starting a connection */			
			$connect = $this->connect();

			/* starting the query */
			$query = "SELECT $fields FROM $table $condition";
			
			/* preparing the query */
			$stmt = $connect->prepare($query);

			/* binding the parameters */
			$cont = 1;
			foreach($val as $key => $value){
				$stmt->bindParam($cont, $value['parametro'], $value['tipo']);
				$cont++;	
			}

			/* running the query */
			$stmt->execute();
			
			/* fetch */
			$fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);

			/* closing the connection and returning */
			$conexao = null;
			return $fetch;
		}

		public function execute($query){

			/* starting a connection */		
            $conexao = $this->connect();

            /* preparing the query */
            $stmt = $conexao->prepare($query);

            /* running the query and closing connection */
			$stmt->execute();
			$conexao = null;
		}
	}
?>
