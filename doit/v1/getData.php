<?php 


require_once '../includes/DbOperations.php';

if($_SERVER['REQUEST_METHOD']=='GET'){
    $db = new DbOperations(); 

    $result = $db->getData();
}


