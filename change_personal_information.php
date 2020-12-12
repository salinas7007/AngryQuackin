<?php
/* Define every thing that is submitted as variables of their own. */
#This needs to be sanitized later

		
#Find which user we are
$user_id = $_SESSION['user_id'];

require 'connect.php';



#If I need to update User Name
if (isset($_POST['change_user_name'])) {
	$changed_un =  mysqli_real_escape_string($conn, htmlentities($_POST['change_user_name']));
	
	#Changed User Name is Unique
	#PHP CHECK TO SEE IF USERNAME IS UNIQUE
		$un_check = "SELECT user_id FROM forum_members WHERE user_name='" . $changed_un . "';";
		$testcheck = mysqli_query($conn, $un_check);
		$number_of_results = mysqli_num_rows($testcheck);
		if ($number_of_results > 0) {
		include 'Error.php';
		echo "<div id='PleaseInclude'>Oops! This user name is already in use!</div>";
		exit;
		}
	$update1 = "UPDATE forum_members SET user_name='" . $changed_un . "' WHERE user_id='" . $user_id . "';";
	//mysqli_query($conn, $update1);
	
	
	if (!mysqli_query($conn, $update1))
  {
  include 'Error.php';
  echo "<div id='PleaseInclude'>Error description: " . mysqli_error($conn) . "</div>";
  } else {
  #COME BACK HERE AND WRITE A FILE FOR IT
} 


#If I need to update Contact Email
if (isset($_POST['change_contact_email'])) {
	$changed_ce =  mysqli_real_escape_string($conn, htmlentities($_POST['change_contact_email']));
	
	#Changed Contact Email is unique
		#Also, screw coming up with relevant variable names. I'm listening to Legally Blonde, so that's where these names are coming from.
		$emmet = "SELECT user_id FROM forum_members WHERE contact_email='" . $changed_ce . "';";
		$ugotthebestfreakinshoes = mysqli_query($conn, $emmet);
		$legallyblonde = mysqli_num_rows($ugotthebestfreakinshoes);
		if ($legallyblonde > 0) {
			include 'Error.php';
			echo "<div id='PleaseInclude'>Oops! This contact email is already in use!</div>";
			exit;
		}	
	$update3 = "UPDATE forum_members SET contact_email=" . $changed_ce . " WHERE user_id=" . $user_id . ";";
	mysqli_query($conn, $update3);
}

#If I need to update LSC student status
if (isset($_POST['change_ls_student_yn'])) {
	$changed_lsc_status =  mysqli_real_escape_string($conn, htmlentities($_POST['change_ls_student_yn']));
	$update4 = "UPDATE forum_members SET ls_student_yn=" . $changed_lsc_status . " WHERE user_id=" . $user_id . ";";
	mysqli_query($conn, $update4);
}

#If I need to update my_ls_email
if (isset($_POST['change_my_ls_email'])) {
	$changed_lse =  mysqli_real_escape_string($conn, htmlentities($_POST['change_my_ls_email']));
	$update5 = "UPDATE forum_members SET my_ls_email=" . $changed_lse . " WHERE user_id=" . $user_id . ";";
	mysqli_query($conn, $update5);
}
}

?>