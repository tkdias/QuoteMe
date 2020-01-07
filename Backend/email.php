<?php

				$email = "tkdias7@gmail.com";
				$message = "Your message";
				$subject = "Sent From Smart EE Checkup Portal";
        $from = "From: $email<$email>\r\nReturn-path: $email";

        mail('tkdias7@gmail.com', $subject, $message, $from);
				echo "<script>alert('New RFID request successfully added')</script>";

?>

