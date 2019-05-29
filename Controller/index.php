<?php
/*
 *  @autor Rainer Siebrandt
 *  @version 1.0
 *
 *  Dieses Modul ist das Herzstück.
 */

    header('Content-Type: text/html; charset=iso-8859-1');
    include("basic_functions.php");
    include("config.php");
    include("db_functions.php");
    include("appl_functions.php");
    
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    
    session_start();
    
    // Dispatching, die über den Parameter "id" definierte Funktion ausführen
    if(isset($_REQUEST['id'])) $func = $_REQUEST['id']; else $func = 'playlist';
    // Falls  cfg_func_list nicht existiert, abbrechen!
    $flist = getValue('cfg_func_list');
    if ( !count($flist) ) die("cfg_func_list nicht definiert!");
    
    // Aktiver Link global speichern, da dieser später noch verwendet wird
    setValue('func', $func);
    // Funktion aufrufen und Rückgabewert in "inhalt" speichern
    setValue('inhalt', $func());
    
    echo runTemplate("../View/Pages/index.htm.php");
?>