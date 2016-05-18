<?php

$email = $_POST["postemail"];
session_start();
$_SESSION['email'] = $email;
$passwordv = $_POST["postpassword"];
$password = md5($passwordv);
$check;
$counter = 0;

if (file_exists("user_db.txt")){
	$datei = file_get_contents("user_db.txt");
	$zeilen = explode("\n", $datei);
	unset($zeilen[count($zeilen)-1]);
	$splitted_values = array();

	foreach ($zeilen as $zeile) {
		$splitted_values[] = explode("£", $zeile);
	}

	foreach ($splitted_values as $values) {
		if ($splitted_values[$counter][1] == $email) {
			if ($splitted_values[$counter][2] === $password) {
				$check = "true";
				$_SESSION['logedin'] = true;
			}
		}
		$counter += 1;
	}


}else{
	$check = "false";
	$file = fopen("user_db.txt", "w");
	fclose ($file);
}

echo $check;

?>
