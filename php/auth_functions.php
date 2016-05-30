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
		if (authentication()){
			return runTemplate("../templates/fotoalben.htm.php");
		}

	}
	setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
	return runTemplate( "../templates/login.htm.php" );
}

/*
 * Prüft ob die Benutzerangaben korrekt sind.
 */
function authentication() {

	$email = $_POST['email'];
	$passwordf = $_POST['password'];
	$password = md5($passwordf);

	$benutzer= db_select_benutzer($email);
	if ($benutzer[0]['email'] == $email){
		if(CheckPasswordCompare($password,$benutzer[0]['password'])){
			$_SESSION['email'] = $email;
			$_SESSION['benutzerId'] = $benutzer[0]['bid'];
			return true;
		}else {
			return false;
		}
	}else{
		return false;
	}
}

/*
 * Prüft, ob ein Benutzer angemeldet ist
 */
function angemeldet() {
	if (strlen(getSessionValue("benutzerId")) > 0) return true;
	else return false;
}
?>