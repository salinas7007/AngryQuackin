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


$header_title = "Replies";
require 'Header.php';

?>

<html>
<body>
	<div id='TheActualThreads'>
<?php


	
$post_number = $_POST['post_number']; 

#connect to MySQL
require 'connect.php';

#Set up query
$query="SELECT * FROM original_posts WHERE post_number=" . $post_number . " ORDER BY post_number ASC;";

#Get the results of the query
$results = mysqli_query($conn, $query);

#Get the number of rows in the result
$num = mysqli_num_rows($results);

if ($num == 0)	{
	include 'Error.php';
	echo "<br><br><div id='PleaseInclude'>We appear to be having a problem with providing the post you wish to see. Please try again later, and if the problem persists, don't hesitate to contact us.</div>";
}

#Set $i
$i = 0;
		
#Set variable for member

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
	<p>" . $post . "</p>
</div> ";
		
#increase $i
	$i++;
		}
	
#connect to MySQL
require 'connect.php';

#Set up query
$replies_query = "SELECT * FROM replies WHERE post_number=" . $post_number . " ORDER BY reply_id DESC;";

#Get the results of the query
$replies_results = mysqli_query($conn, $replies_query);

#Get the number of rows in the result
$numofreplies = mysqli_num_rows($replies_results);
#$numofreplies->num_rows;

#Set $i, or in this case, $ir
		$ir = 0;

#Check that make sure replies exist
if ($numofreplies == 0)	{
		echo "<div id='PleaseInclude'>There are no replies to this thread yet. Please, be the first to add one!</div>";
	
}   else { 

	#This bit again ↓↓↓
		$replies_everything = array();
		while($replies_row = mysqli_fetch_assoc($replies_results)) {
        $replies_everything[] = $replies_row;
	} 
	
	#Back into the loop to display replies
		while ($ir < $numofreplies) {
			
		#Set variables
			$reply = $replies_everything[$ir]['reply'];
			$r_date = $replies_everything[$ir]['date'];
			$r_member = $replies_everything[$ir]['member'];
		#Display all the info
			echo "
	<div id='Reply'>
	<table align='left'>
		<tr>
			<td style='border: 2px solid white;'>" . $r_member . "</td>
			<td style='border: 2px solid white;'>" . $r_date . "</td>
		</tr>
	</table>
	<br><br>
	<p>" . $reply . "</p>
</div>";
		$ir++;
		}
}	

#This ↓↓↓ is pretty vital.
$_SESSION['page'] = $post_number;

?>
	<div id='Reply'>
		<form action="New_Reply.php" method="POST">
			<b>Post a reply</b>
			<p>Reply:</p><br>
			<textarea rows="5" cols="50" name="reply"></textarea>
			<br><br>
			<input type="submit" value="Submit">
		</form>
	</div>
</div>

</body>

</html>