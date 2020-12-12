<?php


$to = $email_address;

$subject = 'Confirm Email Address';

$from = 'sidney.jane@forum.sandboxsalinas.com';

 

// To send HTML mail, the Content-type header must be set

$headers  = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

 

// Create email headers

$headers .= 'From: '.$from."\r\n".

    'Reply-To: '.$from."\r\n" .

    'X-Mailer: PHP/' . phpversion();

 

// Compose a simple HTML email message

$message = '<body style="background-color: Black;">
		<table cellpadding= "10" style="color: Green; text-align: center; height: 100%; width: 50%; font-family: Verdana, Geneva, sans-serif; font-size: 18px; margin-left: auto; margin-right: auto;">
			<tr>
				<td>
	<h3 style="font-size: 25px;">This email has been sent because it has been listed as the contact email for an account at www.forum.sandboxsalinas.com. </h3>
				</td>
			</tr>
			<tr>
				<td>
	If this email has been sent mistakenly, we apologize. Or at least, I apologize. Sidney Jane, the power of the forum, just kind of lurks ominiously, as per usual. 
				</td>
			</tr>
			<tr>
				<td>
	Anyway, if this email reached you by mistake, please click this button:
		<form method="POST" action="http://forum.sandboxsalinas.com/C_Bounce1.php">
		<input type="hidden" name="code" value="' . $contact_e_code . '">
		<input type="hidden" name="email" value="' . $to . '">
		<input type="submit" name="Wrong_Email" value="Wrong_Email">
		</form>
				</td>
			</tr>
			<tr>
				<td>
	If this is the correct email address, please confirm it for us: 
		<form method="POST" action="http://forum.sandboxsalinas.com/C_Bounce1.php">
		<input type="hidden" name="code" value="' . $contact_e_code . '">
		<input type="hidden" name="email" value="' . $to . '">
		<input type="submit" name="Confirm_Email" value="Confirm_Email">
		</form>
				</td
			</tr>
			<tr>
				<td>
	Thank You!
				</td>
			</tr>
		</table>
</body>
</html>';



if(mail($to, $subject, $message, $headers)){

    //echo 'Your mail has been sent successfully.';

} else{

    echo 'Unable to send email. Please try again.';

}

?>