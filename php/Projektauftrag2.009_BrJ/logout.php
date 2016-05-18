<?php
	session_start();

	if ($_SESSION['logedin'] == true) {
		session_unset();
		session_destroy();
		echo "true";
	}else{
		echo "false";
	};


?>
