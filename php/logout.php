<?php
	session_start();

	if ($_SESSION['benutzerId'] > 0) {
		session_unset();
		session_destroy();
		echo "true";
	}else{
		echo "false";
	};


?>
