<?php
	if($_POST){
		// Information to be modified
		$to_email = "dr3772@gmail.com"; // email address to which the form data will be sent
		$subject = "Jr Auto Contact Request Demo"; // subject of the email that is sent
		$thanks_page = "index.html"; // path to the thank you page following successful form submission
		$contact_page = "index.html"; // path to the HTML contact page where the form appears


		$nam = strip_tags($_POST["fullName"]);
		$ema = strip_tags($_POST["email"]);
		$pho = strip_tags($_POST["phoneNo"]);
		$com = strip_tags($_POST["zipCode"]);

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: <' .$ema. '>' . "\r\n";
		$headers .= "Reply-To: ".$ema."\r\n";

		$email_body = 
			"<strong>From: </strong>" . $nam . "<br />
			<strong>Email: </strong>" . $ema . "<br />	
			<strong>Phone: </strong>" . $pho . "<br />	
			<strong>Zip: </strong>" . $com;
			

		// Assuming there's no error, send the email and redirect to Thank You page
			
		if( mail($to_email, $subject, $email_body, $headers) ) {	
			echo '<div class="form-msg"> <i class="fa fa-check-square-o"></i> Thank you ' .$nam. '. We successfully Received Your Details! </div>';
		} else {	
			echo '<div class="form-msg-error"> <i class="fa fa-warning"></i> Sorry ' .$nam. '. Your Email was not sent. Resubmit form again Please.. </div>';
		}
	}
die();
?>