<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <meta name="description" content="A place for students to learn what the heck is actually going on, specifically in community colleges in the Houston, TX area.">
<meta name="keywords" content="Lone Star College, Houston Community College, Houston, Texas, college">
<meta name="author" content="Liz">
	<title><?php echo $header_title; ?></title>
	<style>
		#AngryQuackin {
		height: 50%;
		width: 50%;
		text-align: center;
		background-image: url("http://angryquackin.com/angryquackin.jpg");
		}
		#ChangePersonalInfo {
		background-color: WhiteSmoke;
		height: 100%;
		width: 100%;
		border: none;
		text-align: center;
		color: black;
		}
		#CourtesySearch {
		text-align: center;
		border: 0px solid black;
		}
		#date_and_message {
		margin-left: auto;
		margin-right: auto;
		border: 2px solid SlateGray; 
		}
		#div {
		height: 100%;
		width: 98%;
		border: 8px solid LightSlateGray;
		}
		#first {
		background-color: LightSlateGray;
		background-image: url("https://s-media-cache-ak0.pinimg.com/736x/87/08/80/870880fe6ff0df75bb79a4864bb01780.jpg");
		background-size: cover;
		background-attachment: scroll;
		background-repeat: no-repeat;
		background-position: center center;
		color: Black;
		font-size: 150%;
		font-family: "Times New Roman", Helvetica, serif;
		text-align: center;
		height: 150%;
		width: 98%;
		}
		#Forum_Posts {
		margin-left: auto;
		margin-right: auto;
		height: 100%;
		width: 98%;
		background-color: LightGray;
		border: 6px solid Gray;
		text-align: center;
		}
		#JoinUsForm {
		background-color: WhiteSmoke;
		height: 100%;
		width: 100%;
		border: none;
		text-align: center;
		color: black;
		}
		#LoggedIn {
		position: absolute;
		height: 100%;
		width: 100%;
		background-color: LightSlateGray;
		border: none;
		text-align: center;
		}
		#LogInForm {
		background-color: WhiteSmoke;
		height: 100%;
		width: 100%;
		border: none;
		text-align: center;
		color: black;
		}
		#LogOut {
		height: 100%;
		width: 50%;
		border: none;
		text-align: center;
		color: black;
		display: block;
		margin-left: auto;
		margin-right: auto;
		}
		#navbar {
		background-color: Gainsboro;
		height: 100%;
		width: 18%;
		border: 3px solid LightSlateGray;
		text-align: left;
		color: Black;
		float: left;
		}
		#Notifications {
		background-color: Azure;
		height: 100%;
		width: 30%;
		float: right;
		border: none;
		padding: 10px;
		margin: 10px;
		text-align: left;
		color: Black;
		}
		#OnePost{
		background-color: Gainsboro;
		border: 5px solid LightSlateGray;
		padding: 10px;
		margin: 10px;
		color: Black;
		margin-left: auto;
		margin-right: auto;
		width: 50%;
		font-family: 'Trebuchet MS', Helvetica, sans-serif;
		height: 100%;
		overflow: auto;		
		}
		#PersonalInfo {
		background-color: Azure;
		height: 100%;
		width: 30%;
		float: left;
		border: none;
		padding: 10px;
		margin: 10px;
		text-align: left;
		color: Black;
		}
		#PleaseInclude {
		height: 75%;
		width: 100%;
		border: none;
		text-align: center;
		font-family: 'Trebuchet MS', Helvetica, sans-serif;
		font-weight: bold;
		font-style: italic;
		}
		#Reply {
		background-color: Gainsboro;
		border: 3px solid WhiteSmoke;
		padding: 10px;
		margin: 10px;
		color: Black;
		margin-left: auto;
		margin-right: auto;
		width: 50%;
		font-family: 'Trebuchet MS', Helvetica, sans-serif;
		overflow: auto;
		}
		#searchbar {
		text-align: center;
		background-color: LightSlateGray;
		font-family: 'Trebuchet MS', Helvetica, sans-serif;
		font-size: 75%;
		margin-left: auto;
		margin-right: auto;
		background-color: Gainsboro;
		height: 100%;
		width: 25%;
		}
		#search_fields {
		margin-left: auto;
		margin-right: auto;
		background-color: Gainsboro;
		width: 50%;
		height: 100%;
		font-family: 'Trebuchet MS', Helvetica, sans-serif;
		color: black;
		border: 6px solid SlateGray;
		}
		#second {
		color: WhiteSmoke;
		font-size: 90%;
		font-family: "Times New Roman", Helvetica, serif;
		text-align: center;
		}
		#StupidThing {
		background-color: Gainsboro;
		border: none;
		color: Black;
		width: 100%;
		font-family: 'Trebuchet MS', Helvetica, sans-serif;
		height: 100%;
		overflow: auto;
		}
		#table {
		font-family: "Times New Roman", Helvetica, serif;
		color: black;
		font-size: 100%;
		text-align: center;
		background-color:LightSlateGray;
		}		
		#TheActualThreads {
		background-color: WhiteSmoke;
		height: 90%;
		width: 80%;
		border: 6px solid LightSlateGray;
		text-align: center;
		color: Black;
		margin-left: auto;
		margin-right: auto;
		overflow: auto;
		}
		#ThreadForm {
		background-color: Gainsboro;
		height: 100%;
		width: 75%;
		border: none;
		padding: 10px;
		margin: 10px;
		text-align: left;
		color: Black;
		margin-left: auto;
		margin-right: auto;
		overflow: auto;
		}
		h3 {
		text-align: center;
		font-size: 150%;
		font-family: 'Trebuchet MS', Helvetica, sans-serif;
		color: black;
		}
		body {
		background-color: LightGray;
		}
		p {
		text-align: left;
		font-size: 100%;
		font-family: 'Trebuchet MS', Helvetica, sans-serif;
		color: black;
		} 
	</style>
</head>

<body>

<div id="first">
	<h1>Angry Quackin</h1>
	<div id="second">
	<h4>A place for students to learn what's actually going on.</h4>
	</div>
	<div id="table">
		<table align="center" width=100% height=100% border=2>
	   <tr>
		<td><a href="Home.php">Home</a></td>
		<td><a href="Policies.php">Policies</a></td>
		<td><a href="About%20Us.php">About Us</a></td>
		<td><a href="My_Account.php">My Account</a></td>
		<td><a href="Threads.php">Threads</a></td>
		<td><a href="Join%20Us.php">Join Us!</td>
		<td><a href="New Thread.php">New Thread</a></td>
		<td><a href="Log%20In_Log%20Out.php">Log In/Log Out</a></td>
	   </tr>
	</table>
		
	<div id="searchbar">
	   <a href="Search Forum Posts.php">SEARCH FORUM POSTS</a>
</div>
</div>
</div>
</body>
</html>