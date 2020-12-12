<?php
/*Hello, future me! This file, currently named "LoggedIn.php" is displayed when a user finishes logging into a website. Were I nice, this would probably be capable of also kicking them back to whatever page they were previously on, instead of making them reclick it and everything. Unfortunately, I'm not nice. Just rather lazy. So it doesn't. */
error_reporting(E_ALL & ~E_NOTICE);
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

$header_title = "My Account";
require 'Header.php';
require 'connect.php';

$login_user_name = $_SESSION['user_name'];
$login_user_pass = $_SESSION['user_pass'];
$login_contact_email = $_SESSION['contact_email'];
$login_ls_student_yn = $_SESSION['ls_student_yn'];
$login_my_ls_email = $_SESSION['my_ls_email'];


echo "
	<h2 style='text-align: center;'>Welcome, $login_user_name!<br></h2> 
	<div id='LoggedIn'>
		<div id='PersonalInfo'>
			<h3>Personal Info</h3><br><br>
			<ul>
				<li>UserName: <br> $login_user_name</li>
				<li>Contact Email: <br> $login_contact_email</li>
				<li>Student here? <br>$login_ls_student_yn</li>
				<li>My .edu Email: <br>$login_my_ls_email</li>
			</ul>
			<p><ins><a href='Change Personal Information.php'>Change Personal Info</a></ins></p><br>
		</div>
		<div id='Notifications'>
			<h3>Notifications</h3>";


$notifying = "SELECT * FROM Notifications WHERE user_id=" . $_SESSION['user_id'] . " ORDER BY Date DESC;";
			
			$notifications= mysqli_query($conn, $notifying);
			
			$num = mysqli_num_rows($notifications);
			
			$everything = array();
    while($row = mysqli_fetch_assoc($notifications)) {
        $everything[] = $row;
	} 
			
	$i= 0;
			
			if ($num == 0)	{
				$message = "None";
			} else {
				while ($i < $num) {
					$message = $everything[$i]['Notification'];
					$date_time = $everything[$i]['Date'];
					
	echo "
			<div id='date_and_message'>
			<table>
				<tr>
					<td>
						<h5>" .  $date_time . "</h5>
					</td>
				</tr>
				<tr>
					<td>
			<p>" . $message . "</p>
					</td>
				</tr>
			</table>
			</div>
			";
		
		$i++;
	}
	}
	
	mysqli_close($conn);
	
	?>
	
	
		</div>
	</div>
	<br>
	<p style='text-align: center; color: DarkBlue;'><em><strong>
	This is still in testing stages and under construction, so it will change often and dramatically. So, for example, don't be surprised to come back and find the page bright pink with glittery unicorns prancing all over. 
	<em><strong>
	</p>
	<br><br>
	
	
	
</body>
</html>