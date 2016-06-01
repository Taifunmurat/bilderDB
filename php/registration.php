<?php
	include("db_functions.php");
	include("basic_functions.php");

	$email = $_POST["postemail"];
	$firstname = $_POST["postfirstname"];
	$lastname = $_POST["postlastname"];
	$passwordv = $_POST["postpassword"];
	$password = md5($passwordv);

	$emailcheck = "false";


	$param = array(
		'vorname' => $firstname,
		'nachname' => $lastname,
		'email' => $email
	);

	if (db_check_email($email) <= 0){
		setValues($param);
		db_insert_benutzer($param, $password);
		$emailcheck = "true";
	}


	echo $emailcheck;

?>
