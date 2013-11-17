<?php

require 'config.php';

if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_SESSION['u'])) {
	
	
	$email = mysql_real_escape_string($_POST['email']);
	$password = sha1($_POST['password']);
	$id = $U['id'];
	$req = mysql_query('UPDATE user SET email = "'.$email.'", password = "'.$password.'" WHERE user = "'.$id.'"')

	redirect('account.html', 'Information Updated');

}

head('Log In', '<link rel="stylesheet" type="text/css" href="static/login.css" />');
?>

  <div class="login">
    <h1>Account</h1>
    <form method="post" action="">  
      <p><input type="text" name="email" value="" placeholder="email"></p>
      <p><input type="password" name="password" value="" placeholder="Password"></p>
      <p class="submit"><input type="submit" name="commit" value="Update"></p>
    </form>
  </div>

<?php
foot();
?>
