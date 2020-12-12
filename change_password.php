<?php

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
# If there is a $_SESSION variables already
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


#MAKE SURE EVERYTHING'S BEEN POSTED
#Check that current password has been entered
if (!isset($_POST['current_pw'])) {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Oops! Please confirm your current password.</div>";
		exit;
	} 
# Check that new password has been entered.
if (!isset($_POST['change_user_pass'])) {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Oops! Please say what you want your new password to be.</div>";
		exit;
	} 
#Check that confirm new password has been entered
if (!isset($_POST['confirm_change_user_pass'])) {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Oops! Please say what you want your new password to be.</div>";
		exit;
	} 

	#PASSWORD CHECK
	if (strcmp(htmlentities($_POST['change_user_pass']), $_SESSION['user_pass']) != 0) {
		include 'Error.php';
		echo "<div id='PleaseInclude'>Oops! Current password is incorrect. Please try again!</div>"; 
		exit;
	}	
	
#Check that the password is long enough
	if (strlen(htmlentities($_POST['change_user_pass'])) < 6) {
		include 'Error.php';
		echo "<div id='PleaseInclude'>Oops! This password isn't long enough.</div>";
		exit;
	}

	#Check that passwords match
	if (strcmp(htmlentities($_POST['change_user_pass']), htmlentities($_POST['confirm_change_user_pass'])) != 0) {
		include 'Error.php';
		echo "<div id='PleaseInclude'>Oops! These passwords don't match!</div>"; 
		exit;
	}

#If I need to update User Password
if (isset($_POST['change_user_pass'])) {
	$changed_pw =  mysqli_real_escape_string($conn, htmlentities($_POST['change_user_pass']));
	$update2 = "UPDATE forum_members SET user_pass=" . $changed_pw . " WHERE user_id=" . $user_id . ";";
	mysqli_query($conn, $update2);
}


?>