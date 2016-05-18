<?php

	$email = $_POST["postemail"];
	$passwordv = $_POST["postpassword"];
	$password = md5($passwordv);
	$gender = $_POST["postgender"];
	$hobbys = $_POST["posthobby"];
	$creditcard = $_POST["postcreditcard"];
	$user_db = fopen("user_db.txt", "a");
	$emailcheck = "true";


	$benutzer_datei = file_get_contents("user_db.txt");
	$zeilen = explode("\n", $benutzer_datei);
	unset($zeilen[count($zeilen)-1]);
	$splitted_text = array();

	foreach ($zeilen as $zeile) {
		$splitted_text[] = explode("£", $zeile);
	}
	foreach($splitted_text as $aValues){
        if(in_array($email, $aValues)) {
        	$emailcheck = "false";
        }
    }

    $id = count($splitted_text) + 1;

	if ($emailcheck == "true") {
		$query =$id . '£' . $email . '£' . $password  . '£' . $gender . '£' . $hobbys . '£' . $creditcard;
		fwrite($user_db, $query.PHP_EOL);
		fclose ($user_db);
	}

	echo $emailcheck;

?>
