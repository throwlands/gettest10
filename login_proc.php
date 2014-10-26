<?php
session_start();
include "includes/dbconnect.php";

$username = $_POST['username'] ;
$pw = $_POST['password'] ;

// Retrieve username and password from database according to user's input
$prep = mysql_query("SELECT * FROM user_cred WHERE (username = '".$username."') and (password = '".$pw."')");


if (mysql_num_rows($prep) == 1) {
	$_SESSION['username'] = $_POST['username'];
	
	$user = mysql_fetch_array($prep);
	
	$_SESSION['user_id'] = $user['uid'];
	header('Location: core.php');
}else {
	$error = mysql_error();
	header("Location: index.php?stat=login_failure&err=".$error);
	}
/*

*/
?>