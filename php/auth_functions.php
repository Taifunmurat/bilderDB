<?php
/*
 *  @autor Michael Abplanalp
 *  @version 1.0
 *
 *  Dieses Modul beinhaltet Funktionen, welche die Logik zur Authentifizierung implementieren.
 *
 */

/*
 * Beinhaltet die Anwendungslogik zur Registration
 */
function registration() {

	if(isset($_REQUEST['submit'])){

		$email = $_POST["email"];
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$password1 = $_POST["password1"];
		$password2 = $_POST["password2"];
		$error = "";
		$info="";

		if(CheckEmpty($email) && db_check_email($email) > 0){
			$error = "Die E-Mail-Adresse ist ungültig oder bereits registriert!<br>";
		}elseif (!CheckEmailFormat($email)){
			$error = "Der Benutzername muss eine valide E-Mail-Adresse enthalten!<br>";
		}elseif (!CheckPasswordFormat($password1) && !CheckPasswordFormat($password2)){
			$error = "Passwort-Anforderungen werden nicht erfüllt!<br> Das Passwort muss mindestens 9 Zeichen lang sein, <br>Gross- und Kleinbuchstaben, sowie Sonderzeichen enthalten!<br>";
		}elseif (!CheckPasswordCompare($password1, $password2)){
			$error = "Passwörter stimmen nicht überein!<br>";
		}else{
			$password = md5($password1);
			$param = array(
				'vorname' => $firstname,
				'nachname' => $lastname,
				'email' => $email
			);
			setValues($param);
			db_insert_benutzer($param, $password);
			$info = "Sie wurden erfolgreich registriert!";
		}
		if($error != ""){
			setValue('errorspace', $error);
		}elseif($info != ""){
			setValue('informationspace', $info);
		}
	}


    // Template abfüllen und Resultat zurückgeben
    setValue( 'phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__ );
    return runTemplate( "../templates/registration.htm.php" );
}

/*
 * Beinhaltet die Anwendungslogik zum Login
 */
function login() {
	// Das Forum wird ohne Angabe der Funktion aufgerufen bzw. es wurde auf die Schaltfläche "abbrechen" geklickt
	if(isset($_REQUEST['submit'])){

		if (checkLogindata()){
			setValue('menu_titel', 'Hauptmenü');
			setValue('menu_eintraege', 'cfg_menu_member');
			setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
			return runTemplate( "../templates/fotoalben.htm.php" );
		}
	}
	setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
	return runTemplate( "../templates/login.htm.php" );
};





function checkLogindata(){

	$email = $_POST["username"];
	$passwordv = $_POST["password"];
	$password = md5($passwordv);

	if (CheckEmpty($email) && CheckEmpty($passwordv)){
		$benutzer= db_select_benutzer($email);
		if ($benutzer[0]['email'] == $email) {
			if ($benutzer[0]['passwort'] == $password) {
				$_SESSION['email'] = $email;
				$_SESSION["benutzerId"] = $benutzer[0]['bid'];
			}else{
				echo "Benutzername oder Passwort falsch!";
			}

		}else{
			echo "Benutzername oder Passwort falsch!";
		}
	}
}
/*
 * Prüft ob die Benutzerangaben korrekt sind.
 */


/*
 * Prüft, ob ein Benutzer angemeldet ist
 */
function angemeldet() {
	if (strlen(getSessionValue("benutzerId")) > 0) return true;
	else return false;
}

function logout(){
	session_destroy();
	setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
	setValue('menu_titel', 'Login-Menü');
	setValue('menu_eintraege', 'cfg_menu_login');
	return runTemplate( "../templates/logout.htm.php" );

}
?>