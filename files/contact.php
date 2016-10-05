<?php
	if (isset($_POST["submit"])) {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Keith Website'; 
		$to = 'keithyoerg@gmail.com'; 
		$subject = 'Message from Contact Demo ';
		
		$body ="From: $first_name $last_name\n E-Mail: $email\n Message:\n $message";
		// Check if first name has been entered
		if (!$_POST['first_name']) {
			$errFName = 'Please enter your first name';
		}
		
		// Check if last name has been entered
		if (!$_POST['last_name']) {
			$errLName = 'Please enter your last name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
}
	}
?>