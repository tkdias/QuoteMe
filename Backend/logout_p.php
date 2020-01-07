<?php 

	session_start();

	$_SESSION = array();

	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-86400, '/');
	}

	session_destroy();
    //echo "<script>alert('xsacdfg')</script>";

	// redirecting the user to the login page
    header('Location: login_p.php?logout=yes');
   
 ?>