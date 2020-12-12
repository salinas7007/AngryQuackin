<?php
# If there is a $_SESSION variable already

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
		
if (isset($_SESSION['signed_in'])) {
	require 'Error.php';
	echo "<div id='PleaseInclude'>You are already signed in to your account. Would you like to <a href='Log Out.php'>log out</a>?</div>";
	exit;
}

$header_title = "Join Us";

require 'Header.php';

$_SESSION['joining'] = true;

?>

<html>
<body>
	<h3>Join Us!</h3>
	<div id="JoinUsForm">
	<form method="POST" action="Join_Us.php" type="text/html">
        Username: <br><input type="text" name="user_name" maxlength="40"/>
			<br>
			<br>
			<br>
        Password: 
		<br><small><em>(Please make sure your password is seven or more characters long.)</em></small>
		<br><input type="password" name="user_pass" maxlength="50">
			<br><br>
        Confirm Password: <br><input type="password" name="confirm_user_pass" maxlength="50">
			<br><br><br>
        Contact Email: <br><input type="email" name="contact_email" maxlength="40">
			<br><br><br>
		Are you a student at a Houston area 2-year college? <br><input type="radio" name="ls_student_yn" value="Yes"> Yes, I am.<br>
		<input type="radio" name="ls_student_yn" value="No">No, I'm just a creepy stalker.
		<br><br><br>
		If yes, please provide your .edu email. <input type="email" name="my_ls_email" maxlength="40">
		<br><br><br>
		I have read and agree to the <a href="Policies.php" target="_blank">terms and conditions</a>. <br><input type="radio" name="agree" value="Yes"> Yes<br>
		<input type="radio" name="agree" value="No">No
		<br><br><br>
        <input type="submit" value="Submit">
		</form>
	</div>
	<br>
	<p style="text-align: center; color: DarkBlue;"><em><strong>
	This is still in testing stages and under construction, so it will change often and dramatically. So, for example, don't be surprised to come back and find the page bright pink with glittery unicorns prancing all over. 
	<em><strong>
	</p>
	<br>
	<br>
</body>		
</html>
