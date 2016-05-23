<?php


/*
 *  @autor Michael Abplanalp
 *  @version 1.0
 *
 *  Dieses Modul beinhaltet sämtliche Datenbankfunktionen.
 *  Die Funktionen formulieren die SQL-Anweisungen und rufen dann die Funktionen
 *  sqlQuery() und sqlSelect() aus dem Modul basic_functions.php auf.
 *
 */

function db_insert_benutzer($params, $passwort) {
    $sql = "insert into benutzer (vorname, nachname, email, passwort)
            values ('".escapeSpecialChars($params['vorname'])."','".escapeSpecialChars($params['nachname'])."','".escapeSpecialChars($params['email'])."','".$passwort."')";
    sqlQuery($sql);
}

function db_check_email($email) {
    $sql = "select email from benutzer where email like '".$email."'";
    return sqlSelect($sql);
}

function db_select_benutzer($email) {
    $sql = "select bid, vorname, nachname, email, passwort from benutzer where email like '".$email."'";
    return sqlSelect($sql);
}

