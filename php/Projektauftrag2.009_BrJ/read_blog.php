<?php
	session_start();
	$datei = file_get_contents("user_blogs.txt");
	if (file_exists("user_blogs.txt") AND $datei != ""){

		$zeilen = explode("\n", $datei);
		unset($zeilen[count($zeilen)-1]);
		$splitted_values = array();
		$users = array();
		$array = array();
		$blog_values = array($array);
		$counter = 0;

		foreach ($zeilen as $zeile) {
			$splitted_values[] = explode("£", $zeile);
		}

		while ($counter <= count($splitted_values)-1) {
			if(in_array($splitted_values[$counter][0], $users)) {
				$counter2 = 0;
				foreach ($users as $user){
					if ($users[$counter2] == $splitted_values[$counter][0]) {
						$blog_values[$counter2][] = $splitted_values[$counter][1];
					}
					$counter2 += 1;

				}
        	}else{
        		$users[] = $splitted_values[$counter][0];
        		$counter -= 1;
        	}
			$counter += 1;
		}



		$pers_counter = count($users) -1;

		foreach ($blog_values as $blogs) {
			$i = 0;
			$count = count($blog_values[$pers_counter]) -1;
			$count2 = $count;
			while ($count >= 0) {
				if ($count == $count2){
					$blogtext = "<b>" . $users[$pers_counter] ."</b><br>_____________________________<br>" .  "Post_ID: " .$count. "<br> " . $blog_values[$pers_counter][$count] . "<br><br><br>" ;
				}else{
					$blogtext = "Post_ID: " .$count. "<br> " . $blog_values[$pers_counter][$count] . "<br><br><br>";
				}
				echo $blogtext;
				$count -= 1;

			}
			$pers_counter -= 1;
		}
	}else{
		echo "false";
	}
?>
