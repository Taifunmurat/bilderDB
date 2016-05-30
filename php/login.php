<?php

	include("db_functions.php");
	include("basic_functions.php");
	include ("auth_functions.php");

	//function userLogin(){
		$email = $_POST["postemail"];
		$passwordv = $_POST["postpassword"];
		$password = md5($passwordv);


	
		$benutzer= db_select_benutzer($email);
		if ($benutzer[0]['email'] == $email){
			if($benutzer[0]['passwort'] == $password){
				$_SESSION['email'] = $email;
				$_SESSION["benutzerId"] = $benutzer[0]['bid'];
				echo login();
				 //"true";
			}
		}
	//}


//echo $check;

?>
