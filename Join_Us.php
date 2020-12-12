<?php

/* Define every thing that is submitted as variables of their own. */
#This needs to be sanitized later

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

#Make sure they're coming from the correct webpage
if (!isset($_SESSION['joining'])) {
	require 'Join Us.php';
	exit;
} else {
	#If the $_SESSION 'joining' variable doesn't equal true (aka, not trying to join correctly)
	if ($_SESSION['joining'] != true) {
		require 'Join Us.php';
		exit;
	}
}

unset($_SESSION['joining']);


require 'connect.php';


# Make sure the password is long enough.
if (strlen(htmlentities($_POST['user_pass'])) < 6) {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Oops! This password isn't long enough.</div>";
	exit;
}

#PASSWORD CHECK
if (strcmp(htmlentities($_POST['user_pass']), htmlentities($_POST['confirm_user_pass'])) != 0) {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Oops! These passwords don't match!</div>"; 
	exit;
}

#CONFIRM FIELDS AREN'T EMPTY

#if Username is blank
if (!empty($_POST["user_name"])) {
	$user_name = mysqli_real_escape_string($conn, htmlentities($_POST["user_name"]));
} else {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Oops! Username has been left blank.</div>" ;
	exit;
} 

#if Password is blank
if (!empty($_POST['user_pass'])) {
	$user_pass = mysqli_real_escape_string($conn, htmlentities($_POST['user_pass']));
} else {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Oops! Password has been left blank.</div>" ;
	exit;
}

#if Confirm password is blank
if (!empty($_POST['confirm_user_pass'])) {
	$confirm_user_pass = mysqli_real_escape_string($conn, htmlentities($_POST['confirm_user_pass']));
} else {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Oops! Confirm Password has been left blank.</div>";
	exit;
}

#If Contact Email is Blank
if (!empty($_POST['contact_email'])) {
	$contact_email = mysqli_real_escape_string($conn, htmlentities($_POST['contact_email']));
	if (!filter_var($contact_email, FILTER_VALIDATE_EMAIL)) {
  		include 'Error.php';
		echo "<div id='PleaseInclude'>Oops! Contact Email is not in a valid email format.</div>";
		exit;
	} else {
	
		#PHP CHECK TO SEE IF CONTACT EMAIL IS UNIQUE
		#Also, screw coming up with relevant variable names. I'm listening to Legally Blonde, so that's where these names are coming from.
		$emmet = "SELECT user_id FROM forum_members WHERE contact_email='" . $contact_email . "';";
		$ugotthebestfreakinshoes = mysqli_query($conn, $emmet);
		$legallyblonde = mysqli_num_rows($ugotthebestfreakinshoes);
		if ($legallyblonde > 0) {
			include 'Error.php';
			echo "<div id='PleaseInclude'>Oops! This contact email is already in use!</div>";
			exit;
		} else {	
		$email_address = $_POST['contact_email'];
		$contact_e_code = rand(10000000, 1000000000);
		require 'C_Confirmation_Email.php';
		}
	}
} else {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Oops! Contact Email has been left empty.</div>";
	exit;
}

#If Lone Star Student is blank
	#NOTE FOR FUTURE REFERENCE
	/*Yes, this was in fact the part where you kept getting errors like "warning: invalid argument supplied foreach()". So what did I do? Add the (array) bit in the function term thigs whatever they're called. You can see it below. But yeah, that's what I did. */
if (!empty($_POST['ls_student_yn'])) {
	foreach ((array)$_POST["ls_student_yn"] as $ls_student_yn) {
		$ls_student_yn = mysqli_real_escape_string($conn, htmlentities($ls_student_yn));
	} 
} else {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Oops! You forgot to say if you're a student here or not.</div>";
	exit;
}


#If Lone Star Email is empty
if ($ls_student_yn === "Yes") {
	if(($_POST["my_ls_email"]) != '') {
		$my_ls_email = mysqli_real_escape_string($conn, htmlentities($_POST["my_ls_email"]));
	
		#Check to make sure it is indeed a .edu email address and valid email address format
		$pattern1 = '/edu\z/i';
		$pattern2 = '/edu\s/i';
		if (!preg_match('/edu\z/i', $my_ls_email) || !preg_match('/edu\s/i', $my_ls_email)) {
 			if (!filter_var($my_ls_email, FILTER_VALIDATE_EMAIL)) {
  			include 'Error.php';
			echo "<div id='PleaseInclude'>Oops! Student Email is not in a valid email format.</div>";
			exit;
			} else {			
			$mlsemail = "SELECT user_id FROM forum_members WHERE my_ls_email='" . $my_ls_email . "';";
			$resolution = mysqli_query($conn, $mlsemail);
			$numero_uno = mysqli_num_rows($resolution);
			if ($numero_uno > 0) {
				include 'Error.php';
				echo "<div id='PleaseInclude'>Oops! This email is already in use!</div>";
				exit;
			} else {		
				$email_address = $_POST["my_ls_email"];
				$student_e_code = rand(10000000, 1000000000);
				require 'S_Confirmation_Email.php';
				$my_ls_email = $email_address;				
			}	
			}	
			} else {
				include 'Error.php';
			echo "<div id='PleaseInclude'>Oops! This is not a valid student email.</div>";
			exit;
		}
			
		} else {
		include 'Error.php';
		echo "<div id='PleaseInclude'>Oops! Student email has been left empty. <br><br>This email address is important to confirm that you are a student at a local community college.</div>";
		exit;
		}
} elseif ($ls_student_yn === "No") {
	$my_ls_email = '';	
} else {
	include 'Error.php';
		echo "<div id='PleaseInclude'>Oops! We'd like to know if you're a community college student or not.<br><br></div>";
		exit;
}	

if (!empty($_POST['agree'])) {
	foreach ((array)$_POST["agree"] as $agree) {
		$agree = mysqli_real_escape_string($conn, htmlentities($agree));
	} 
} else {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Oops! Please say whether you agree to the terms and conditions or 
	t.</div>";
	exit;
}
if ($agree ==="No") {
		$header_title= "Access Denied";
		require 'Header.php';
		echo "<div id='PleaseInclude'><br><br>Sorry, unless you agree to the terms and conditions, you can't join this forum. </div>";
		exit;
	}



#PHP CHECK TO SEE IF USERNAME IS UNIQUE
$un_check = "SELECT user_id FROM forum_members WHERE user_name='" . $user_name . "';";
$testcheck = mysqli_query($conn, $un_check);
$number_of_results = mysqli_num_rows($testcheck);
if ($number_of_results > 0) {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Oops! This user name is already in use!</div>";
	exit;
	}
	


#INSERT THE FORM DATA INTO MYSQL TABLE
$Join_Us = "INSERT INTO forum_members (user_name, user_pass, contact_email, ls_student_yn, my_ls_email, Contact_E_Code, Student_E_Code, Confirmed_User, Confirmed_Student) VALUES ('$user_name', '$user_pass', '$contact_email', '$ls_student_yn', '$my_ls_email', '$contact_e_code', '$student_e_code', 'NO', 'NO');";
 
#CONSIDER COMING BACK AND CHANGING THIS TO STUFF THAT WORKS
#If the connection worked OK

if (mysqli_query($conn, $Join_Us)) {
	
	$user_id = mysqli_query($conn, "SELECT user_id FROM forum_members WHERE user_name='" . $user_name . "';");
	
#if (mysqli_query($conn, $Join_Us) === TRUE) { 
	# Set session variables
		$_SESSION['signed_in'] = true;
		$_SESSION['user_name'] = $user_name;
		$_SESSION['user_pass'] = $user_pass;
		$_SESSION['contact_email'] = $contact_email;
		$_SESSION['ls_student_yn'] = $ls_student_yn;
		$_SESSION['my_ls_email'] = $my_ls_email;
		$_SESSION['user_id'] = $user_id;

	include 'Successfully Joined.php';
	exit;
	
} else {

	
	include 'Error.php';
	echo "<br><br><div id='PleaseInclude'>Oops! Something went wrong. Please try again, and if problems persist, feel free to contact me."; 

}



?>