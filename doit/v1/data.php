
<?php 

header('Content-Type: application/json');

require_once '../includes/DbOperations.php';

$response = array(); 

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(
		isset($_POST['task']) and 
			isset($_POST['date']) and 
				isset($_POST['time']))
		{
		//operate the data further 

		$db = new DbOperations(); 

		$result = $db->createData( 	$_POST['task'],
									$_POST['date'],
									$_POST['time']
								);
		if($result == 1){
			$response['error'] = false; 
			$response['message'] = "Task add successfully";
		}elseif($result == 2){
			$response['error'] = true; 
			$response['message'] = "Some error occurred please try again";			
		}

	}else{
		$response['error'] = true; 
		$response['message'] = "Required fields are missing";
	}
}else{
	$response['error'] = true; 
	$response['message'] = "Invalid Request";
}

echo json_encode($response);