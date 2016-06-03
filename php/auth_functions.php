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