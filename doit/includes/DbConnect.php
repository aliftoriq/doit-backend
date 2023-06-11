<?php 

	class DbConnect{

		private $con; 

		function __construct(){

		}

		function connect(){
			$this->con = new mysqli('localhost', 'root', '', 'db_doit');

			if(mysqli_connect_errno()){
				echo "Failed to connect with database".mysqli_connect_err(); 
			}

			return $this->con; 
		}
	}