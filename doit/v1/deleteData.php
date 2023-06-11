<?php 

header('Content-Type: application/json');

require_once '../includes/DbOperations.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

	$db = new DbOperations(); 

	$result = $db->deleteData( $_POST['id'],);
    
	if($result){
		echo "berhasil";
	}else{
		echo "gagal update";
	}
}else{
	echo "tidak ada post";
}