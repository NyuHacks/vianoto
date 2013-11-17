<?php
session_start();

mysql_connect('','','') or die('CANNOT CONNECT TO DATABSE');
mysql_select_db('')or die('CANNOT SELECT DATABASE');


// If user is logged in, retrieve user information
if(empty($_SESSION['U'])) {
	$U = $_SESSION['u'];
}


require 'page.php';


?>