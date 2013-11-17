<?php

require 'config.php';

if(!empty($_POST) && empty($_SESSION['u'])) {
	$user = mysql_real_escape_string($_POST['username']);
	$password = sha1($_POST['password']);

	$req = mysql_query('SELECT id, username FROM user WHERE 
		(username = "'.$user.'" OR email = "'.$user.'")
			AND password = "'.$password.'"')
		or die('I <3 MySQL');
	$U = mysql_fetch_assoc($req);


	if(!empty($U)) {
		$_SESSION['u'] = $U;
		redirect($_SERVER['HTTP_REFERER'], 'You are now logged in, '. $U['username']);
	}
	else redirect('login.html', 'Wrong credidentials. Please try again');

	die;
}


head('Log In', '<link rel="stylesheet" type="text/css" href="static/login.css" />', false);
?>
  <div class="login">
    <h1>Log In</h1>
    <form method="post" action="">
      <p><input type="text" name="username" value="" placeholder="Username or Email"></p>
      <p><input type="password" name="password" value="" placeholder="Password"></p>
      <p class="submit"><input type="submit" name="commit" value="Login"></p>
    </form>
  </div>

<?php
foot();
?>