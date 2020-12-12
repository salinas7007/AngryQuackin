<?php
$server = "localhost"; 
$username   = "elizachick"; /*add in what needs to be added*/
$password   = "59OaCYjpNE7v"; //what goes here is my stuff
$database   = "elizachi_forum"; //for this local engine
 
 //Create connection
 $conn = mysqli_connect($server, $username, $password, $database);

 //Check connection
 if (mysqli_connect_errno($conn)) {
	die("<div id='PleaseInclude'>Connection failed: </div>" . mysqli_connect_errno($conn));
 }
?>
