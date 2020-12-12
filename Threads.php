<?php

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
	
# If there are no $_SESSION variables yet
if (!isset($_SESSION['signed_in'])) {
	require 'Log In.php';
} else {
	#If the $_SESSION 'signed in' variable doesn't equal true (aka, not signed in)
	if ($_SESSION['signed_in'] != true) {
		require 'Log In.php';
	} else {
		#If they are signed in
		require 'Display Threads.php';
	}
}
?>