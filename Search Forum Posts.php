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
 
 $header_title = "Search";
 
 
 require 'Header.php';
 
 ?>
<html>
<body>
<div id='search_fields'>
	<form action="Search.php" method="POST">
	Please choose what you want to search:  the titles of posts, the words of the posts, or the replies to the posts.<br>
	<small><em>For fastest search, select 'Titles'</em></small>
	<br>
	<select autofocus required name="query">
		<option value="Title">Title</option>
		<option value="Posts">Posts</option>
		<option value="Replies">Replies</option>
	</select>
	<br>
	<br>
	Please enter the word or phrase you want to search for. Remember, spelling, punctuation, and the order of the words count!
	<input type="text" name="keywords">
	<br>
	<br>
	<input type="submit" name="search" value="search">
</div>
</body>
</html>
