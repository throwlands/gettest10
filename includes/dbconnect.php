<?php
//  Database Connect
    $user_name = "root";
    $pass_word = "evanlily7";
//	$password = "";
    $database = "hooktion";
    $server = "localhost";
	$db_handle = mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);
?>