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

function db_insert_album($params){
    $sql = "insert into fotoalben (name, bid)
            values ('".escapeSpecialChars($params['name'])."','".$params['bid']."')";
    sqlQuery($sql);
}

function db_insert_foto($params){
    $sql = "insert into bilder (pname, ptags, ppath, aid)
            values ('".escapeSpecialChars($params['pname'])."','".escapeSpecialChars($params['ptags'])."','".escapeSpecialChars($params['ppath'])."','".escapeSpecialChars($params['aid'])."')";
    sqlQuery($sql);
}









function db_check_email($email) {
    $sql = "select email from benutzer where email like '".$email."'";
    return sqlSelect($sql);
}

function db_check_fotoalbum($bid, $name){
    $sql = "select aid, name from fotoalben where bid like '".$bid."' and name like '".$name."'";
    return sqlSelect($sql);
}









function db_select_benutzer($email) {
    $sql = "select bid, vorname, nachname, email, passwort from benutzer where email like '".$email."'";
    return sqlSelect($sql);
}

function db_select_fotoalben($bid){
    $sql = "select aid, name, bid from fotoalben where bid like '".$bid."'";
    return sqlSelect($sql);
}

function db_select_albumid($name){
    $sql = "select aid from fotoalben where name like '".$name."'";
    return sqlSelect($sql);
}





