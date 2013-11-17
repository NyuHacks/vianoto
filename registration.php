<?php 
require ('config.php');

if (isset($_POST['submitted'])) {

	$errors = array();

	if (empty($_POST['first_name'])) {
		$errors[] = 'Please Enter Your First Name';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
	}
	
	if (empty($_POST['last_name'])) {
		$errors[] = 'Please Enter Your Last Name.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
	}
	
	if (empty($_POST['email'])) {
		$errors[] = 'Please Enter Your Email Address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}

	if (empty($_POST['password'])) {
		$errors[] = 'Please Enter Your Password.';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
	}
	
	if (empty($errors)) {
		$q = "INSERT INTO users (first_name, last_name, email, password, registration_date) VALUES ('$fn', '$ln', '$e', SHA1('$p'), NOW() )";		
		$r = @mysqli_query ($dbc, $q);
		if ($r) {
			echo '<h1>Thank you!</h1>';	
		
		} else {
			<p class="error">'Houston we have a problem</p>'; 
						
		}
		
		mysqli_close($dbc);
		include ('includes/footer.html'); 
		exit();
		
	} else {
		echo '<p>Please try again.</p><p><br /></p>';
		
	}
	
	mysqli_close($dbc);

} ?>

<h1>Registration</h1>
<form action="registration.php" method="post">
	<p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
	<p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
	<p>Email Address: <input type="text" name="email" size="20" maxlength="80" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
	<p>Password: <input type="password" name="password" size="6" maxlength="8" /></p>
	<p><input type="submit" name="submit" value="Registration" /></p>
	<input type="hidden" name="submitted" value="TRUE" />
</form>
