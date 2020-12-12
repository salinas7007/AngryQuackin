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
    #Make sure they're coming from the correct webpage
/*if (!isset($_SESSION['replying'])) {
	require 'New Reply.php';
	exit;
} else {
	#If the $_SESSION 'joining' variable doesn't equal true (aka, not trying to join correctly)
	if ($_SESSION['replying'] != true) {
		require 'New Reply.php';
		exit;
	}
}*/

#unset($_SESSION['replying']);


#Connect to MySQL
require 'connect.php';


#If they are not authorized to post
$step1 = "SELECT Confirmed_User FROM forum_members WHERE user_id = '" . $_SESSION['user_id'] . "';";

$result = mysqli_query($conn, $step1);
$row = mysqli_fetch_assoc($result);
$result1 = $row["Confirmed_User"];

if ($result1 === 'YES') {


	#Make sure they actually typed something in the reply box
	if (!empty($_POST["reply"])) {
		$reply = mysqli_real_escape_string($conn, htmlentities($_POST["reply"]));
	} else {
		include 'Error.php';
		echo "<div id='PleaseInclude'>Oops! Please add a reply.</div>" ;
		exit;
	} 

	#Set user variable
	$member = $_SESSION['user_name'];
	$post_number = $_SESSION['page'];



	#INSERT THE FORM DATA INTO MYSQL TABLE
	$PostReply = "INSERT INTO replies (reply, date, member, post_number) VALUES ('$reply', now(), '$member', '$post_number');";

	#This ↓↓↓ is for the successfully replied page, don't worry too much about it.


	#If the connection worked OK
	if (mysqli_query($conn, $PostReply) === TRUE) {
		include 'Successfully Replied.php';
	}
	#If something went wrong
	else {
		include 'Error.php'; 
		echo "<br><br><div id='PleaseInclude'>Oops! Something went wrong: </div>" . $PostReply . "<br>" . mysqli_connect_errno(); 
	}
	
} elseif ($result1 === 'NO') {
	include 'Error.php';
		echo "<br><br><div id='PleaseInclude'>Oops! We're sory, but your contact email address hasn't been confirmed yet.<br> Until it's ben confirmed, you won't be able to post threads or replies.<br><br> To see the notifications informing you about this, look on the right hand side of <a href='My_Account.php'>your account page</a>. <br><br>Or click <a href='Change Personal Information.php'>here</a> to resubmit your contact email. <br><br>We're sorry for the inconvenience. </div>";

} else {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Oops! For some reason, we cannot post your thread at this time. Please try again later. <br><br>If Sidney Jane continues to be difficult, please email adminsarecool@angryquackin.com for assistance.</div>";
}



	
?>