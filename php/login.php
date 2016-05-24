<?php

	include("db_functions.php");
	include("basic_functions.php");

	$email = $_POST["postemail"];
	$passwordv = $_POST["postpassword"];
	$password = md5($passwordv);
	$check;

	
	$benutzer= db_select_benutzer($email);
	if ($benutzer[0]['email'] == $email){
		if($benutzer[0]['passwort'] == $password){
			$_SESSION['email'] = $email;
			$_SESSION['benutzerId'] = $benutzer[0]['bid'];
			echo "true";
		}
	}








//echo $check;

?>
