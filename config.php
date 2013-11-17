<?php
session_start();

mysql_connect('us-cdbr-east-04.cleardb.com', 'b53be1921dd5ee', '8af16c38')or die('MySQL is being nasty');
mysql_select_db('heroku_677bd37e289b91b')or die('MySQL hates you');

// If user is logged in, retrieve user information
if(!empty($_SESSION['U']))
	$U = $_SESSION['u'];
else $U = '';


require 'page.php';


?>