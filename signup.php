<?php

include("config/functions.php");
	

if(isset($_POST["name"])  && isset($_POST["email"]) && isset($_POST["password"]) )
	{

   
		  $name = $_POST["name"];
		$email = $_POST["email"];
	 	$password = $_POST["password"];

		        if(check_email($email) == false){

            header("Location: logsignemail.php");
             } else {

   $query = "INSERT INTO users (Name, Password, email) VALUES ('{$name}','{$password}','{$email}')";
			executeSql($query);
			header("Location: success.php");


             }


			
		
	}






?>