<?php
require 'config.php';
require_once 'page.php';

head('Annotate videos in real time', '<script>
	$(document).ready(function(){
		$.validator.addMethod("isPassEqual", 
			function(value, element){
				var x = $("#pass").val();
				return value == x;
				}, "Passwords must match");
		$(\'#registration\').validate({
			rules: {
				first: {
					required: true
				},
				last: {
					required: true,
					
				},
				email: {
					required: true,
					email: true
				},
				username: {
					required: true
				},
				pass: {
					required: true,
					minlength: 5
				},
				passcheck: {
					required: true,
					isPassEqual: true
				}
			},
			submitHandler: function(form){
				form.submit();
			}
		});	
	});

	</script>');
?>

<div class="demo">
DEMO GOES HERE
</div>

<div class="mycontent">
	<!--<div class="demo"><p>asdfasdfsad</p></div>-->
	<h1> SIGN UP!</h1>
	<div class="create_account">
		<form id="registration" action="">
			<table>
			<!--First name-->
			<tr>
				<label><td>First Name:</td><label>
				<td><input class = "rounded" id="first" name="first" placeholder="" type="text"/></td>
				
				
			</tr>
			
			
			<!--Last name-->
			<tr>
				<td>Last Name: </td>
				<td><input class = "rounded" id="last" name="last" placeholder="" type="text"/></td>
				
			</tr>
			
		
			<!--Email-->
			<tr>
				<td>Email: </td>
				<td><input class = "rounded" id="email" name="email" type="text"/></td>
			</tr>
			
			
			<!--Username-->
			<tr>
				<td>Username: </td>
				<td><input class = "rounded" id="username" name="username" type="text"/></td>
			</tr>	
			
			
			<!--Password-->
			<tr>
				<td>Password:</td>
				<td><input class = "rounded" id="pass" name="pass" type="password"/></td>
			</tr>
			
			
			
			<tr>
				<td>Repeat Password:</td>
				<td><input class = "rounded" type="password" name="passcheck" id="passcheck"/></td>
			</tr>
			
			
			<!--Submit-->
			<tr><td></td><td><input type="submit" value="Register" /></td></tr>
			
			</table>
		</form>
	
	</div>
<div>

<?php 
foot();
?>