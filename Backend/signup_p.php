<?php

    //create session
    session_start();

	// import database connection file
    require_once('dbconnect.php');

    $randnumint=rand(100000,999999);
    $randnum = (string)$randnumint;

    // check user clicked register button
    if (isset($_POST['submit'])) {
        
    // create array to store errors
    $error = array();
    
    if (!isset($_POST['d_first_name']) || strlen(trim($_POST['d_first_name'])) < 1) {
			$error[] = 'Firstname is Missing';
    }   
		if (!isset($_POST['d_last_name']) || strlen(trim($_POST['d_last_name'])) < 1) {
			$error[] = 'Lastname is Missing';
		}               
    if (!isset($_POST['d_gender']) || strlen(trim($_POST['d_gender'])) < 1) {
			$error[] = 'Gender is Missing';
    }        
		if (!isset($_POST['d_dob']) || strlen(trim($_POST['d_dob'])) < 1) {
			$error[] = 'Date of Birth is Missing / Invalid';
    }        
		if (!isset($_POST['d_nic']) || strlen(trim($_POST['d_nic'])) < 1) {
			$error[] = 'NIC is Missing / Invalid';
    }    
    if (!isset($_POST['d_regno']) || strlen(trim($_POST['d_regno'])) < 1) {
			$error[] = 'Registration Number Missing';
		}                      
		if (!isset($_POST['d_address']) || strlen(trim($_POST['d_address'])) < 1) {
			$error[] = 'Street is Missing';
		}
		if (!isset($_POST['d_city']) || strlen(trim($_POST['d_city'])) < 1) {
			$error[] = 'City is Missing';
		}
		if (!isset($_POST['d_province']) || strlen(trim($_POST['d_province'])) < 1) {
			$error[] = 'Province is Missing';
		}
		if (!isset($_POST['d_mobile']) || strlen(trim($_POST['d_mobile'])) < 1) {
			$error[] = 'Mobile is Missing / Invalid';
		}
		if (!isset($_POST['d_email']) || strlen(trim($_POST['d_email'])) < 1) {
			$error[] = 'E-mail is Missing / Invalid';
		}
		if (!isset($_POST['d_password']) || strlen(trim($_POST['d_password'])) < 1) {
			$error[] = 'Password is Missing / Invalid';
    }
        
        // check any error in this form
        if (empty($error)) {
            // save user email & password into varibale
            $firstName = $_POST['d_first_name'];
            $lastName = $_POST['d_last_name'];
            $gender = $_POST['d_gender'];
            $DOB = $_POST['d_dob'];
            $nic = $_POST['d_nic'];
            $regno = $_POST['d_regno'];
            $address = $_POST['d_address'];
            $city = $_POST['d_city'];
            $province = $_POST['d_province'];
            $tNo = $_POST['d_mobile'];
            $email = $_POST['d_email'];
					  $password = $_POST['d_password'];

            if($_POST['d_password'] == $_POST['d_cpassword']){
              $hashed_password = sha1($password);
            }
            else{
              $error[] = 'Password not matched';
            }
            
            //Image Data
					  $file_name = $_FILES['image']['name'];
        	  $file_type = $_FILES['image']['type'];
        	  $file_size = $_FILES['image']['size'];
					  $temp_name = $_FILES['image']['tmp_name'];
					
					  $upload_path = 'images/';

					  $file_txt = substr($file_name,  0, strripos($file_name, '.')); // file name
        	  $file_ext = substr($file_name, strripos($file_name, '.')); // file extention

            $newfilename = md5($file_txt) . $file_ext;
          
            // create database query
            $query = "INSERT INTO doctors (doctorID,first_name,last_name,gender,dob,nic,regno,address,city,province,mobile,email,password, image)
            VALUES ('".$_POST["d_doctorID"]."','".$_POST["d_first_name"]."','".$_POST["d_last_name"]."','".$_POST["d_gender"]."','".$_POST["d_dob"]."','".$_POST["d_nic"]."','".$_POST["d_regno"]."','".$_POST["d_address"]."','".$_POST["d_city"]."','".$_POST["d_province"]."','".$_POST["d_mobile"]."','".$_POST["d_email"]."','$hashed_password', '$newfilename')";

            //excute the query
    		    $result = mysqli_query($conn, $query);
            echo "<script>alert('new registration successful')</script>";
            // upload image
            $file_upload = move_uploaded_file($temp_name, $upload_path . $newfilename);

			      //check databse query is success
			      if ($result && $file_upload) {
              echo "<script>alert('new registration successful')</script>";
              header('Location: login_d.php');

			      }
			      else{
				      echo "<script>alert('new registration failed')</script>";
			      }
        }
        else{
          echo "<script>alert('Please Fill the Details')</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart EE Checkup | Doctors Sign Up</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/mdb/css/bootstrap.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="bootstrap/mdb/css/style.css" rel="stylesheet">
    <!--Sweet Alert-->
    <link href="bower_components/bootstrap-sweetalert/dist/sweetalert.css" rel="stylesheet">
  
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">

</head>

<body img src="dist/img/img_gym/Background.jpg">

<div class="login-box">
  <div class="login-logo">
    <!-- <a href="index.php">UNIVERSAL<b> GYM</b></a> -->
	<a href="index.php"><font  size="6" color="#FFFFFF" class="animated fadeInDownBig" align="center" >Automated Centralized Smart EE Checkup
Portal Network System.</font></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign Up to access your dashboard</p>


<!--*********************************************************************-->
   
      <form action="signup_d.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">

      <div class="form-group has-feedback">
        <input type="text" name="d_doctorID" class="form-control" placeholder="First Name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group">
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="First Name" name="d_first_name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Last Name" name="d_last_name">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="hidden" name="d_gender" class="form-control" value="" >
			<label for="gender-male">
			    <input type="radio" name="d_gender" value="male" id="gender-male" checked="checked"> Male
            </label>
            
			<label for="gender-female">
				<input type="radio" name="d_gender" value="female" id="gender-female"> Female
            </label>

      </div>

      <div class="form-group has-feedback">
        <input type="text" name="d_dob" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask placeholder="Date of Birth">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="d_nic" class="form-control validate[required]" id="" value="" placeholder="NIC Number">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="d_regno" class="form-control validate[required]" id="" value="" placeholder="Registration Number">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="d_address" class="form-control validate[required]" id="" value="" placeholder="Address">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="d_city" class="form-control validate[required]" id="" value="" placeholder="City">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="d_province" class="form-control" id="" value="" placeholder=" Province">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="d_mobile" class="form-control" data-inputmask='"mask": "(99) 999-9999"' data-mask id="" value="" placeholder="7x xxx xxxx">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="d_email" class="form-control validate[required]" id="" value="" placeholder="E-mail">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="d_password" class="form-control validate[required]" value="" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="d_cpassword" class="form-control validate[required]" value="" placeholder="Confirm Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="file" name="image" class="form-control validate[required]" value="" placeholder="Display Image">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>

        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


<!--*******************************************************************-->

    <!-- /.social-auth-links -->


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-3.3.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

    <!-- JQuery -->
    <script type="bootstrap/text/javascript" src="bootstrap/mdb/js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="bootstrap/text/javascript" src="bootstrap/mdb/js/tether.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="bootstrap/text/javascript" src="bootstrap/mdb/js/bootstrap.js"></script>

    <!-- MDB core JavaScript -->
    <script type="bootstrap/text/javascript" src="bootstrap/mdb/js/mdb.min.js"></script>

    <script type="bootstrap/text/javascript" src="bootstrap/mdb/js/jquery-3.1.0.min.js"></script>
    <!-- Select2 -->
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="bower_components/moment/min/moment.min.js"></script>
    <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap color picker -->
    <script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>

    <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
	
	 //Date picker1
    $('#datepicker1').datepicker({
      autoclose: true
    })


    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

</body>
</html>