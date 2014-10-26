<?php
#	USER LOGIN CHECK

session_start();
 
if (!isset($_SESSION['username'])) {
	header('Location: index.php');
}
$username = $_SESSION['username'];  //user specific sales ID
include 'includes/dbconnect.php';

?>