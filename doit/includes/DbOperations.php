<?php 

	class DbOperations{

		private $con; 

		function __construct(){

			require_once dirname(__FILE__).'/DbConnect.php';

			$db = new DbConnect();

			$this->con = $db->connect();

		}

		/*CRUD -> C -> CREATE */

		public function createData($task, $date, $time){
			$stmt = $this->con->query("INSERT INTO `data_task` (`task`, `date`, `time`) VALUES ( '".$task."', '". $date. "', '". $time. "');");
			// $stmt->bind_param("sss",$username,$password,$email);
			if($stmt){
				return 1; 
			}else{
				return 2; 
			}
		}


		public function getData(){
			$qry = "SELECT * FROM data_task";
			// $stmt = $this->con->prepare("SELECT * FROM data_task");
			// $stmt->execute();
			if($stmt = $this->con->query($qry)){
				$data = [];

				while ($row = $stmt->fetch_assoc()) {          
					$data[] = $row;  
				} 

				$response         = [];
				$response['data'] =  $data;
			}else{
				$response = "Failed To Connect";
			}
			

			return $response;
		}

		public function updateStatus($id, $status){
			$stmt = $this->con->query(
				"UPDATE data_task 
				SET 
				status = ". $status ."
				WHERE id = ". $id .";");
				return $stmt;
		}

		public function updateData($id, $task, $date, $time, $status){
			$stmt = $this->con->query(
				"UPDATE data_task 
				SET 
				task = ". $task .",
				date = ". $date .",
				time = ". $time .",
				status = ". $status . "
				WHERE id = " . $id . ";");
		
				return $stmt;
		}
 
		public function deleteData($id){
			$stmt = $this->con->query(
				"DELETE from data_task
				WHERE id = ". $id .";");
				return $stmt;
		}

	}