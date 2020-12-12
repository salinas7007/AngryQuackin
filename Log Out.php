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

$header_title = "Log Out";
require 'Header.php';
echo "

<html>
<body>
	<h3>Are you sure you want to log out?</h3>
	<form method='Get' action='Log_Out.php'>
	<div id='LogOut'>
		<p style='text-align: center;'>Yes, I'm sure</p>
		<input type='submit' name='submit' value='Log Out'>
	</form>
	</div>
	<br>
	<p style='text-align: center; color: DarkBlue;'><em><strong>
	This is still in testing stages and under construction, so it will change often and dramatically. So, for example, don't be surprised to come back and find the page bright pink with glittery unicorns prancing all over. 
	<em><strong>
	</p>
	<br><br>
</body>
</html>";
?>
