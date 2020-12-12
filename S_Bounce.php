<?php

require 'connect.php';


$code_check = $_POST['code'];

$email_check = $_POST['email'];

$query = "SELECT * FROM forum_members WHERE my_ls_email='" . $email_check . "';" ;


#Pull up results
$result = mysqli_query($conn, $query);


#Check that email address is on record
if (mysqli_num_rows($result) > 0) {
		// output data of each row
		$row = mysqli_fetch_assoc($result);
	} else {
		#Write so that it notifies them about the email
		$notification1 = "We could not confirm your Student Email. Please try reentering it from 'Change Personal Info'. If Sidney Jane continues to rage out of control, feel free to tattle to sidney.jane@forum.sandboxsalinas.com.";
		$email_not_on_record = "INSERT INTO Notifications (Notification, user_id) VALUES ('" . $notification1 . "', " . $row['user_id'] . ");";
		mysqli_query($conn, $email_not_on_record);
		exit;
	}
 
 #Check Contact Email code
  if (strcmp($code_check, $row['Contact_E_Code']) != 0) {
	  $notification2 = "We could not confirm your Student Email. Please try reentering it from 'Change Personal Info'. If Sidney Jane continues to rage out of control, feel free to tattle to sidney.jane@forum.sandboxsalinas.com.";
	  $email_code_wrong = "INSERT INTO Notifications (Notification, user_id) VALUES ('" . $notification2 . "', " . $row['user_id'] . ");";
		mysqli_query($conn, $email_code_wrong);
		exit;
	} 
 

if (isset($_POST['Wrong_Email'])) {

	 $notification3 = "Your Student Email is incorrect, and we cannot confirm it. Please try reentering it from 'Change Personal Info'. If Sidney Jane rages out of control, feel free to tattle to sidney.jane@forum.sandboxsalinas.com.";
	 
	 $email_wrong = "INSERT INTO Notifications (Notification, user_id) VALUES ('" . $notification3 . "', " . $row['user_id'] . ");";
	  
	mysqli_query($conn, $email_wrong);
	
		exit;
		
		
} elseif (isset($_POST['Confirm Email'])) {

	$set_yes= "UPDATE forum_members SET Confirmed_Student='YES' WHERE user_id=" . $row['user_id'] . ";";
	
	$notification4 = "Your Student Email has been confirmed.";
	
	$confirmed_S_email = "INSERT INTO Notifications (Notification, user_id) VALUES ('" . $notification4 . "', " . $row['user_id'] . ");";
	
	if (!mysqli_query($conn, $set_yes)) {
	
		$notification5 = "Something went wrong and we can't process your confirmation at this time. Please try again. If Sidney Jane continues to rage out of control, feel free to tattle to sidney.jane@forum.sandboxsalinas.com.";
		
		$unconfirmed_S_email = "INSERT INTO Notifications (Notification, user_id) VALUES ('" . $notification5 . "', " . $row['user_id'] . ");";
		
		mysqli_query($conn, $unconfirmed_S_email);
		
		include 'Error.php';
		
		echo "<div id='PleaseInclude'>Oops! Something went wrong and we can't process your confirmation at this time. Please try again. If Sidney Jane continues to rage out of control, feel free to tattle to sidney.jane@forum.sandboxsalinas.com.</div>";
		
		exit;
	} else {
	
		mysqli_query($conn, $confirmed_S_email);
		
		require "Contact Email Successfully Confirmed.php";
		
		exit;
	}
	
} else {

	include 'Error.php';
	
	echo "<div id='PleaseInclude'><p>ERROR<br><br>Please screenshot and email sidney.jane@forum.sandboxsalinas.com.</p></div>";
	
	exit;
}

?>