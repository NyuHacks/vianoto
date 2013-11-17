<?php

require 'config.php';

if(!empty($_POST['email']) && !empty($_POST['password']) && empty($_SESSION['u'])) {
	
	$email = mysql_real_escape_string($_POST['email']);
	$password = sha1($_POST['password']);
	$req = mysql_query('INSERT INTO user VALUES email = "'.$email.'", password = "'.$password.'" ')

	redirect('index.html');

}

head('Log In', '<link rel="stylesheet" type="text/css" href="static/login.css" />');
?>

<div class="login">
    <h1>Register</h1>
    <form method="post" action="">
    <p><input type="text" name="username" value="" placeholder="Username or Email"></p>
      <p><input type="password" name="password" value="" placeholder="Password"></p>
      <p class="submit"><input type="submit" name="commit" value="Register"></p>
    </form>
  </div>

<?php
foot();
?>
