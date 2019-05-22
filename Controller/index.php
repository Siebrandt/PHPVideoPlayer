<?php
/*
 *  @autor Rainer Siebrandt
 *  @version 1.0
 *
 *  Dieses Modul ist das Herzstück.
 */

    header('Content-Type: text/html; charset=iso-8859-1');
    include("appl_functions.php");
    include("db_functions.php");
    
    session_start();    
    
    echo runTemplate("../View/Pages/index.htm.php");
?>