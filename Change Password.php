<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
# If there are no $_SESSION variables yet
if (!isset($_SESSION['signed_in'])) {
	require 'Log In.php';
	exit;
} else {
	#If the $_SESSION 'signed in' variable doesn't equal true (aka, not signed in)
	if ($_SESSION['signed_in'] != true) {
		require 'Log In.php';
		exit;
	} 
}

$header_title = "Change Password";
require 'Header.php';

 echo "
  <html>
<body>
	<h3>Change Password</h3>
	<div id='ChangePersonalInfo'>
	<form method='POST' action='change_password.php' type='text/html'>
	Current password:
	<br><input type='password' name='current_pw'><br><br>
  Change password:
		<br><small><em>(Please make sure your password is seven or more characters long.)</em></small>
		<br><input type='password' name='change_user_pass' maxlength='50'>
			<br><br>
        Confirm changed password: <br><input type='password' name='confirm_change_user_pass' maxlength='50'>
			<br><br><br>
	</form>
	</div>
	";
	?>
			