<?php
session_start();
$logedcheck = "";
if (isset($_SESSION['logedin'])){
	if ($_SESSION['logedin'] == true) {

		$check = "false";
		$delete = $_POST["postdelete"];

		if (file_exists("user_blogs.txt") AND file_get_contents("user_blogs.txt") != ""){
			$email = $_SESSION['email'];
			$datei = file_get_contents("user_blogs.txt");
			$zeilen = explode("\n", $datei);
			$id = $_POST["postid"] + 1;
			unset($zeilen[count($zeilen)-1]);
			$splitted_values = array();
			$counter = 0;
			$array = array();
			$secure_id;
			$passed_times=1;
			$text = "false";

			$overwrite = "false";
			$idcheck = "false";

			foreach ($zeilen as $zeile) {
				$splitted_values[] = explode("£", $zeile);
			}

			if(count($splitted_values) < $id){
				echo "false";
			}else{

				foreach ($splitted_values as $spval) {
					if ($splitted_values[$counter][0] == $email) {
						if ($passed_times == $id) {
							$text = $splitted_values[$counter][1];
							$secure_id = $counter;
							$overwrite = "true";
						}
						$passed_times += 1;

					}
					$counter += 1;

				}
				$cp_splitted = $splitted_values;

				if ($overwrite == "true") {
					$new_db = fopen("user_blogs.txt", "w");
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
						fwrite($new_db, $query);//php.EOL
						$i += 1;
					}
					fclose($new_db);
				}
				if ($delete != "true") {
				echo $text;
				}
			}

		}
	}else if($_SESSION['logedin'] == false){
		echo "notlogedon";
	}
}else{
	echo "notlogedon";
}

?>
