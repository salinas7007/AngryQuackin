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

$header_title = "New Thread";

require 'Header.php';

$_SESSION['new_thread'] = true;

?>

<html>
<body>
<div id="ThreadForm">
	<form action="New_Thread.php" method="POST">
	<p>Title:</p> <br>
	<input type="text" name="title" maxlength="250"/>
	<br><br>
	<p>Post:</p><br>
	<textarea rows="5" cols="50" name="thread"></textarea>
	<br><br>
	<!--<fieldset><legend>Keywords</legend>
	<small><em>(These allow people to search for your post and others like it.)</em></small><br>
	Food <input type="checkbox" name="keywords" value="food"><br>
	Registration <input type="checkbox" name="keywords" value="registration"><br>
	Financial Aid <input type="checkbox" name="keywords" value="financial_aid"><br>
	Student Life <input type="checkbox" name="keywords" value="student_life"><br>
	Homework <input type="checkbox" name="keywords" value="homework"><br>
	</fieldset>-->
	<br><br>
	<input type="submit" value="submit">
	</form>
</div>
</body>
</html>

