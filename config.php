<?php
session_start();

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"],1);

/*
mysql_connect($server, $username, $password)or die('MySQL is being nasty');
mysql_select_db($db)or die('MySQL hates you');
**/

// If user is logged in, retrieve user information
if(!empty($_SESSION['U']))
	$U = $_SESSION['u'];
else $U = '';


require 'page.php';


?>