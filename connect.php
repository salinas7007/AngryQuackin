<?php
$server = "LOCALHOST"; 
$username   = "USERNAME"; /*add in what needs to be added*/
$password   = "PASSWORD"; //what goes here is my stuff
$database   = "forumName"; //for this local engine
 
 //Create connection
 $conn = mysqli_connect($server, $username, $password, $database);

 //Check connection
 if (mysqli_connect_errno($conn)) {
	die("<div id='PleaseInclude'>Connection failed: </div>" . mysqli_connect_errno($conn));
 }
?>
