<?php

	include("db_functions.php");
	include("basic_functions.php");

	$email = $_POST["postemail"];
	$passwordv = $_POST["postpassword"];
	$password = md5($passwordv);
	$check;

	echo db_check_email($email);
	/*
	if(db_select_benutzer($email) == $password){
		$_SESSION['email'] = $email;
		$_SESSION['benutzerId'] =
	}*/







//echo $check;

?>
