<?php
	$check = "false";
	session_start();
	$text_orig = $_POST["posttext"];
	
	if ($_SESSION['logedin'] == true) {
		$email = $_SESSION['email'];
		$user_db = fopen("user_blogs.txt", "a");
		$text = str_replace("\n", " ", $text_orig);
		$_SESSION['text'] = $text;

		$query = $email . '£' . $text;
		fwrite($user_db, $query.PHP_EOL);
		fclose ($user_db);
		$check = "true";
	}

	echo $check;

?>
