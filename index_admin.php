<?php

    require_once('dbconnect.php');

    $hashed_password = sha1(123456);

    $query = "INSERT INTO admin (first_name, last_name, gender, dob, nic, address, 	city, province, mobile, email, password) VALUES('Admin', 'admin', 'male', '1997/08/30', '9512545622V', 'Homagama', 'Homagama', 'western', '0771854709', 'admin@admin.com', '$hashed_password')";

    $result = mysqli_query($conn, $query);

    if ($result) {
		echo "Recode Added";
	}
	else{
		echo "Query Failed";
	}

?>