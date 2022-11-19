<?php

    class DBOperation{

        private $con;

        function __construct(){

            require_once dirname(__FILE__).'/DBConnect.php';

            $db = new DBConnect();

            $this->con = db->connect();
        }

        function createUser($username, $pass, $email){
            $password = md5($pass);
            $stmt = $this->con->prepare("INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES (NULL,?,?,?);");
            $stmt->bind_param("sss", $username, $password, $email);

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }

        }
    }