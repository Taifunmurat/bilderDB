<?php
/*
 *  @autor Michael Abplanalp
 *  @version 1.0
 *
 *  Dieses Modul beinhaltet Funktionen, welche die Anwendungslogik implementieren.
 *
 */

/*
 * Gibt die entsprechende CSS-Klasse aus einem assiziativen Array (key: Name Eingabefeld) zurück.
 * Wird im Template aufgerufen.
 *
 * @param   $name       Name des Eingabefeldes
 */
function getCssClass( $name ) {
    global $css_classes;
    if (isset($css_classes[$name])) return $css_classes[$name];
    else return getValue('cfg_css_class_normal');
}

/*
 * Beinhaltet die Anwendungslogik zur Anzeige und zum Bearbeiten von allen Fotoalben
 */
function fotoalben() {
    // Template abfüllen und Resultat zurückgeben

    $alben = db_select_fotoalben($_SESSION['benutzerId']);
    setValue('fotoalben', $alben);




    setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
    return runTemplate( "../templates/fotoalben.htm.php" );
}

function fotoUpload(){


    if(isset($_REQUEST['submit'])){
        $albumId = db_select_fotoalben($_SESSION['benutzerId'])[0]['aid'];
        $tags = $_POST['tags'];
        $speicherVerzeichnis = "../bilder/";
        $thumbnailVerzeichnis = "../bilder/thumbnails/";
        $dateiname = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
        $dateiendung = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));


        //Datei Endung prüfen
        $endungen = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array($dateiendung, $endungen)){
            die("Ungültige Dateiendung. Nur jpg, jepg, png und gif-Dateien sind erlaubt!");
        }

        //Speicherpfad
        $pfad = $speicherVerzeichnis.$dateiname.'.'.$dateiendung;
        $bildname = $dateiname.'.'.$dateiendung;
        $thumbnailPfad = $thumbnailVerzeichnis.$dateiname.'.'.$dateiendung;

        if(file_exists($pfad)) {
            $nr = 0;
            while(file_exists($pfad)) {

                $pfad = $speicherVerzeichnis.$dateiname.'_'.$nr.'.'.$dateiendung;
                $bildname = $dateiname.'_'.$nr.'.'.$dateiendung;
                $thumbnailPfad = $thumbnailVerzeichnis.$dateiname.'_'.$nr.'.'.$dateiendung;
                $nr++;
            }
        }
    }



















    }



















    setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
    return runTemplate( "../templates/fotoUpload.htm.php" );
}

function albumAnzeigen(){




    setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
    return runTemplate( "../templates/albumAnzeigen.htm.php" );

}

function albumErstellen(){

    $error = "";
    $info = "";


    if (isset($_REQUEST['submit'])){

        $albumName = $_POST["albumName"];
        $bid = $_SESSION["benutzerId"];
        $alben = db_check_fotoalbum($bid, $albumName);



        if ($alben > 0){
            $error  = "Es existiert bereits ein Album mit diesem Namen!";
        }else{

            $param = array(
                'name' => $albumName,
                'bid' => $bid
            );
            setValues($param);
            db_insert_album($param);
            $info = "Das Album '".$albumName."' wurde erfolgreich erstell!";
        }
    }

    if($error != ""){
        setValue('errorspace', $error);
    }elseif($info != ""){
        setValue('informationspace', $info);
    }

    // Template abfüllen und Resultat zurückgeben
    setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
    return runTemplate( "../templates/albumErstellen.htm.php" );
}

?>
