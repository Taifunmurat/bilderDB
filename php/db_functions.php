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
    $sql = "insert into bilder (pname, ptags, ppath, dpath, aid)
            values ('".escapeSpecialChars($params['pname'])."','".escapeSpecialChars($params['ptags'])."','".escapeSpecialChars($params['ppath'])."','".escapeSpecialChars($params['dpath'])."','".escapeSpecialChars($params['aid'])."')";
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

function db_select_albumid($name, $bid){
    $sql = "select aid from fotoalben where name like '".$name."' and bid like '".$bid."'";
    return sqlSelect($sql);
}

function db_select_fotos($aid, $bid){

    $sql = "select b.pname, b.ptags, b.ppath, b.dpath from bilder as b left join fotoalben as f on b.aid = f.aid where b.aid like '".$aid."' and f.bid like '".$bid."'";
    return sqlSelect($sql);
}








function db_delete_benutzer($bid){
    $sql = "delete from benutzer where bid like '".$bid."'";
}






