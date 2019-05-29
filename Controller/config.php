<?php
/*
 *  @autor Narthana Dasan
 *  @version 2.0
 *
 *  Dieses Modul definert dall Konfigurationsparameter und stellt die DB-Verbindung her.
 */

// Default-CSS-Klasse zur Formatierung der Eingabefelder
setValue('cfg_css_class_normal',"txt");
// Klasse zur Formatierung der Eingabefelder, falls die Eingabeprüfung negativ ausfällt
setValue('cfg_css_class_error',"err");
// Akzeptierte Funktionen
setValue('cfg_func_list', array("playlist","player"));
// Inhalt des Menus
setValue( 'cfg_menu_list', array("playlist"=>"Playlists","player"=>"Videoplayer") );

// Datenbankverbundung herstellen
$db = mysqli_connect("127.0.0.1", "root", "", "objectinventory");	// Zu Datenbankserver verbinden	
setValue('cfg_db', $db);
?>
