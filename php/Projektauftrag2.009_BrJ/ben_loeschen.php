<?php
session_start();

if (isset($_SESSION['logedin'])) {
	$email = $_SESSION['email'];
	if ($email == "admin@admin.ch"){
		$deluser = $_POST["postdeluser"];
		$datei = file_get_contents("user_db.txt");
		$zeilen = explode("\n", $datei);
		unset($zeilen[count($zeilen)-1]);
		$splitted_values = array();
		$counter = 0;
		$secure_id = "";
		$new_db = fopen("user_db.txt", "w");

		foreach ($zeilen as $zeile) {
			$splitted_values[] = explode("£", $zeile);
		}

		foreach ($splitted_values as $splval) {
			if($splitted_values[$counter][1] == $deluser){
				$secure_id = $counter;
			}
			$counter ++;
		}
		if ($secure_id != "") {
			$cp_splitted = $splitted_values;

			$count_splitted = count($splitted_values) - 1;
			while ($secure_id < $count_splitted) {
				$splitted_values[$secure_id] = $cp_splitted[$secure_id + 1];
				$secure_id += 1;
			}
			unset($splitted_values[$count_splitted]);
			$u = 0;
			foreach ($splitted_values as $key) {
				$zeile = implode("£", $key);
				$u += 1;
				$array[] = $zeile;
			}
			$count = count($array) -1;
			$i = 0;
			while($i <= $count){
				$query = $array[$i] . "\n";
				fwrite($new_db, $query); //php.EOL
				$i += 1;
			}
			fclose($new_db);
			echo "true";

		}else{
			echo "nouser";
		}
	}else{
		echo "notadmin";
	}

}else {
	echo "notlogedon";
}


?>
