<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    if ($_SESSION['logging_in'] != true)  {
		#If they did not just come from 'Log In.php'
		include 'Error.php';
	echo "<div id='PleaseInclude'>Page could not be provided.</div>" ;
	exit;
	} else {
	unset($_SESSION['logging_in']);
	}

#php login form

require 'connect.php';

#if Username is blank
if (!empty($_POST["user_name"])) {
	$login_user_name = mysqli_real_escape_string($conn, htmlentities($_POST["user_name"]));
} else {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Please include your User Name.</div>" ;
	exit;
} 

#if Password is blank
if (!empty($_POST['user_pass'])) {
	$login_user_pass = mysqli_real_escape_string($conn, htmlentities($_POST['user_pass']));
} else {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Please include your Password.</div>" ;
	exit;
}



#IF USER NAME DOESN'T MATCH ONE ON FILE

#Set up MySQL query
$sql = "SELECT * FROM forum_members WHERE user_name='" . $login_user_name . "';" ;

#Query MySQL
 
	//Send the query to MySQL database
	$result = mysqli_query($conn, $sql);

#Check if user_name exists
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		$row = mysqli_fetch_assoc($result);
		//echo $row['user_pass'];
		//echo "<br>Welcome " . $login_user_name;
	} else {
		include 'Error.php';
		echo "<div id='PleaseInclude'>Oops! This username is incorrect, or doesn't exist.</div>";
		mysqli_close($conn);
		exit;
	}
 
	#Compare the passwords
    if (strcmp($login_user_pass, $row['user_pass']) != 0) {
		include 'Error.php';
		echo "<div id='PleaseInclude'>Oops! This password is incorrect!</div>"; 
		mysqli_close($conn);
		#print "here it is 2: " . $row['user_pass'];
		#print "<br>" . $login_user_pass;
		exit;
	} 
	#print "here it is 1:" . $row['user_pass'];

	#Set variables
$login_user_name = $row['user_name'];
$login_user_pass = $row['user_pass'];
$login_contact_email = $row['contact_email'];
$login_ls_student_yn = $row['ls_student_yn'];
$login_my_ls_email = $row['my_ls_email'];
$user_id = $row['user_id'];



# Set session variables
$_SESSION['signed_in'] = true;
$_SESSION['user_name'] = $login_user_name;
$_SESSION['user_pass'] = $login_user_pass;
$_SESSION['contact_email'] = $login_contact_email;
$_SESSION['ls_student_yn'] = $login_ls_student_yn;
$_SESSION['my_ls_email'] = $login_my_ls_email;
$_SESSION['user_id'] = $user_id;

require 'My Account.php';

?> 