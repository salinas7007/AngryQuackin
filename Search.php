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


#Connect to MySQL
require 'connect.php'; 


#if search box has been left empty
if (!empty($_POST["keywords"])) {
	$keywords = mysqli_real_escape_string($conn, htmlentities($_POST["keywords"]));
} else {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Oops! Please include a word or phrase you wish to search for.</div>" ;
	exit;
} 

# Make sure the query isn't too long.
if (strlen($keywords > 100)) {
	include 'Error.php';
	echo "<div id='PleaseInclude'>Consider shortening the query for better results.</div>";
	exit;
}


#Search according to which thing has been selected
if ($_POST['query'] = "Title") {
$Seach_Query = "SELECT * FROM original_posts WHERE title LIKE '%$keywords%' ORDER BY post_number DESC;";
} elseif ($_POST['query'] = "Posts") {
$Seach_Query = "SELECT * FROM original_posts WHERE post LIKE '%$keywords%' ORDER BY post_number DESC;";
} else {
	$Seach_Query = "SELECT * FROM replies WHERE reply LIKE '%$keywords%' ORDER BY reply_id DESC;";
}

#Search the MySQL tables
$search_results = mysqli_query($conn, $Seach_Query);

#Check that threads actually exist
$num = mysqli_num_rows($search_results);
if ($num < 1) {
	require "No Results.php";
	exit;
}

 
	
 
$everything = array();
    while($row = mysqli_fetch_assoc($search_results)) {
		$everything[] = $row;
	}
        foreach ($everything as $row) { 
			$header_title = "Search Results";
			require "Header.php";
			echo "
<div id='TheActualThreads'>			
<div id='OnePost'>
	<table align='left'>
		<tr>
			<td style='border: 2px solid white;'>" . $row['member'] . "</td>
			<td style='border: 2px solid white;'>" . $row['date'] . "</td>
		</tr>
		<tr>
			<td align='center' style='border: 2px solid white;'>" . $row['title'] . "</td>
		</tr>
	</table>
	<br><br>
	<p>" . $row['post'] . "</p>
</div> 
</div>";
        } 
	
	
?>