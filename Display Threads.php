<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

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

$header_title = "Threads";
require 'Header.php';


#connect to MySQL
require 'connect.php';

#Set up query
$query="SELECT * FROM original_posts ORDER BY post_number DESC LIMIT 5;";

#Get the results of the query
$results = mysqli_query($conn, $query);

#Get the number of rows in the result
$num = mysqli_num_rows($results);

#Set $i
$i = 0;

#This bit ↓↓↓ makes everything else work. In all honesty, I have zero idea why. But it's all needed, and the code likes it, so whatever
$everything = array();
    while($row = mysqli_fetch_assoc($results)) {
        $everything[] = $row;
	} 

#Display results
while ($i < $num) {
	#Set variables
		$member = $everything[$i]['member'];
		$date = $everything[$i]['date'];
		$title = $everything[$i]['title'];
		$post = $everything[$i]['post'];
		$post_number = $everything[$i]['post_number'];
		

#html display		
		echo "
			<html>
			<body>
		
					<div id='TheActualThreads'>
						<div id='OnePost'>
							<table align='left'>
								<tr>
									<td style='border: 2px solid white;'>" . $member . "</td>
									<td style='border: 2px solid white;'>" . $date . "</td>
								</tr>
								<tr>
									<td align='center' style='border: 2px solid white;'>" . $title . "</td>
								</tr>
							</table>
							<br><br>
							<p>" . $post . "</p><br>
								<div id='StupidThing'>
									<table align='left'>
										<tr>
											<td>
												<form method='POST' action='Replies.php' type='text/html'>
													<input type='hidden' name='post_number' value='" . $post_number . "'>
													<input type='submit' name='See Replies' value='See Replies'>
												</form>
											</td>
										</tr>
									</table>
								</div>
						</div> 
					</div>
			
			</body>
			</html>"
		;	
		
#increase $i
	$i++;
		}
?>		