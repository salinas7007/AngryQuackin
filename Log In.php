<?php

$header_title = "Log In";

require 'Header.php';

$_SESSION['logging_in'] = true;

?>

<html>
<body>
	<h3>Log In</h3>
	<div id="LogInForm">
	<form method="POST" action="Log_In.php">
	 Username: <br><input type="text" name="user_name" maxlength="40"/>
			<br>
			<br>
     Password: <br><input type="password" name="user_pass" maxlength="50">
			<br><br>
		<input type="submit" name="submit" value="submit">
	</form>
	</div>
	<br>
	<p style="text-align: center; color: DarkBlue;"><em><strong>
	This is still in testing stages and under construction, so it will change often and dramatically. So, for example, don't be surprised to come back and find the page bright pink with glittery unicorns prancing all over. 
	<em><strong>
	</p>
	<br><br>
</body>
</html> 