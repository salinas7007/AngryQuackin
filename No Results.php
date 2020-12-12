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

$header_title = "No Results";

require 'Header.php';

?>

<html>
<body>
<h3>NO RESULTS FOUND</h3>
<div id='PleaseInclude'>We were unable to find any results to the keyword or phrase you provided. Please <a href="Search Forum Posts.php">try again</a>.<br>
Some tips to refine your search:</br><br>
~Check your spelling. The Sidney Jane, who's doing the searching, has a limited vocabulary, and refuses to recognize misspellings<br>
~Don't use more than one keyword - Sidney Jane will read it as a phrase<br>
~Sidney Jane is a grammer nazi<br>
~FYI Sidney Jane is not only dumb, but she's a persnickety tyrant, and must be appeased to work<br>
</div>
	</body>

</html>