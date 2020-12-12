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
	
	if ($_SESSION['new_thread'] != true)  {
		#If they did not just come from 'New Threads.php'
		include 'Error.php';
	echo "<div id='PleaseInclude'>Page could not be provided.</div>" ;
	exit;
	} else {
	unset($_SESSION['new_thread']);
	}
	
#Connect to MySQL
require 'connect.php';

#If they are not authorized to post
$step1 = "SELECT Confirmed_User FROM forum_members WHERE user_id = '" . $_SESSION['user_id'] . "';";

$result = mysqli_query($conn, $step1);
$row = mysqli_fetch_assoc($result);
$result1 = $row["Confirmed_User"];

if ($result1 === 'YES') {

	#If title is empty
	if (!empty($_POST["title"])) {
		$title1 = htmlentities($_POST["title"]);
	} else {
		include 'Error.php';
		echo "<div id='PleaseInclude'>Oops! Please include a title.</div>" ;
		exit;
	} 

	#If thread is empty
	if (!empty($_POST["thread"])) {
		$thread1 = htmlentities($_POST["thread"]);
	} else {
		include 'Error.php';
		echo "<div id='PleaseInclude'>Oops! Please include a topic or question.";
	}




	#Escape string

	$title = mysqli_real_escape_string($conn, $title1);

	$thread = mysqli_real_escape_string($conn, $thread1);

	#Set user variable
	$member = $_SESSION['user_name'];



	#INSERT THE FORM DATA INTO MYSQL TABLE
	$PostThread = "INSERT INTO original_posts (post, title, date, member) VALUES ('$thread', '$title', now(), '$member');";


	#If the connection worked OK
	if (!mysqli_query($conn, $PostThread)) {
		include 'Error.php';
		echo "<br><br><div id='PleaseInclude'>Oops! Something went wrong: </div><br>" . mysqli_error($conn); 
	
	} else {
		include 'Successfully Posted.php';
		exit;
	}

} elseif ($result1 === 'NO') {

	include 'Error.php';
		echo "<br><br><div id='PleaseInclude'>Oops! We're sory, but your contact email address hasn't been confirmed yet.<br> Until it's ben confirmed, you won't be able to post threads or replies.<br><br> To see the notifications informing you about this, look on the right hand side of <a href='My_Account.php'>your account page</a>. <br><br>Or click <a href='Change Personal Information.php'>here</a> to resubmit your contact email. <br><br>We're sorry for the inconvenience. </div>";

} else {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Oops! For some reason, we cannot post your thread at this time. Please try again later. <br><br>If you continue to have issues, please contact the administrator for assistance.</div>";
}





?>