<?php
	include("db_functions.php");

	$email = $_POST["postemail"];
	$firstname = $_POST["postfirstname"];
	$lastname = $_POST["postlastname"];
	$passwordv = $_POST["postpassword"];
	$password = md5($passwordv);

	$emailcheck = "true";

	$param = array(
		'vorname' => $firstname,
		'nachname' => $lastname,
		'email' => $email
	);



	echo db_insert_benutzer($param, $password);
	/*
	if (db_check_email($email)){
		db_insert_benutzer($param, $password);
	}else{
		$emailcheck = "false";
	}

	echo $emailcheck;*/

?>
