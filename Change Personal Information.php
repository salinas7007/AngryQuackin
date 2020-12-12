<?php 
//error_reporting(E_ALL & ~E_NOTICE);

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

$header_title = "Change Personal Information";
require 'Header.php';

$login_user_name = $_SESSION['user_name'];
#$login_user_pass = $_SESSION['user_pass'];
$login_contact_email = $_SESSION['contact_email'];
$login_ls_student_yn = $_SESSION['ls_student_yn'];
$login_my_ls_email = $_SESSION['my_ls_email'];

echo "


<html>
<body>
	<h3>What do you want to change?</h3>
	<div id='ChangePersonalInfo'>
	<form method='POST' action='change_personal_information.php' type='text/html'>
        Username: $login_user_name<br>
		Change:<br><input type='text' name='change_user_name' maxlength='40'/>
			<br>
			<br>
			<br>
        Contact Email: $login_contact_email<br>
		Change:
		<br><input type='email' name='change_contact_email' maxlength='40'>
			<br><br><br>
		Lone Star Student: $login_ls_student_yn<br>
		Change:
		<br><input type='radio' name='change_ls_student_yn' value='Yes'> Yes, I am a Lone Star Student.<br>
		<input type='radio' name='ls_student_yn' value='No'>No, I'm just a creepy stalker.
		<br><br><br>
		My Lone Star email: $login_my_ls_email<br>
		Change:
		<input type='email' name='change_my_ls_email' maxlength='40'>
		<br><br><br>
		<input type='submit' name='submit'>
		</form>
		<br><br><br>		
		<form method='POST' action='change_password.php' type='text/html'>
		<input type='submit' name='submit' value='Change Password'>
		</form>
	</div>
</body>		
</html>";