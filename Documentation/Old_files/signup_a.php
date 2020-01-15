<?php

			//create session
			session_start();

			// import database connection file
			require_once('dbconnect.php');
			
			$randnumint=rand(100000,999999);
			$randnum = (string)$randnumint;

			//check user is logged
			if (!isset($_SESSION['first_name'])) {
				header('Location: login_a.php');
			}
			
			// check user clicked login button
			if (isset($_POST['submit'])) {
				
				 // create array to store errors
				 $error = array();

				 if (!isset($_POST['a_first_name']) || strlen(trim($_POST['a_first_name'])) < 1) {
					$error[] = 'Firstname is Missing';
				}   
				if (!isset($_POST['a_last_name']) || strlen(trim($_POST['a_last_name'])) < 1) {
					$error[] = 'Lastname is Missing';
				}               
				if (!isset($_POST['a_gender']) || strlen(trim($_POST['a_gender'])) < 1) {
					$error[] = 'Gender is Missing';
				}        
				if (!isset($_POST['a_dob']) || strlen(trim($_POST['a_dob'])) < 1) {
					$error[] = 'Date of Birth is Missing / Invalid';
				}        
				if (!isset($_POST['a_nic']) || strlen(trim($_POST['a_nic'])) < 1) {
					$error[] = 'NIC is Missing / Invalid';
				}                
				if (!isset($_POST['a_address']) || strlen(trim($_POST['a_address'])) < 1) {
					$error[] = 'Street is Missing';
				}
				if (!isset($_POST['a_city']) || strlen(trim($_POST['a_city'])) < 1) {
					$error[] = 'City is Missing';
				}
				if (!isset($_POST['a_province']) || strlen(trim($_POST['a_province'])) < 1) {
					$error[] = 'Province is Missing';
				}
				if (!isset($_POST['a_mobile']) || strlen(trim($_POST['a_mobile'])) < 1) {
					$error[] = 'Mobile is Missing / Invalid';
				}
				if (!isset($_POST['a_Landline']) || strlen(trim($_POST['a_Landline'])) < 1) {
					$error[] = 'LandLine is Missing / Invalid';
				}
				if (!isset($_POST['a_email']) || strlen(trim($_POST['a_email'])) < 1) {
					$error[] = 'E-mail is Missing / Invalid';
				}
				if (!isset($_POST['a_password']) || strlen(trim($_POST['a_password'])) < 1) {
					$error[] = 'Password is Missing / Invalid';
				}

				// check any error in this form
				if (empty($error)) {
					// save user email & password into varibale
					$fname = $_POST['a_first_name'];
					$lname = $_POST['a_last_name'];
					$gender = $_POST['a_gender'];
					$dob = $_POST['a_dob'];
					$nic = $_POST['a_nic'];
					$address = $_POST['a_address'];
					$city = $_POST['a_city'];
					$province = $_POST['a_province'];
					$mobile = $_POST['a_mobile'];
					$landline = $_POST['a_Landline'];
					$email = $_POST['a_email'];
					$password = $_POST['a_password'];
					$r_password = $_POST['a_cpassword'];

					if ($password == $r_password) {
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
					//$query = "INSERT INTO admins (adminID,first_name,last_name,gender,dob,nic,address,city,province,mobile,Landline,email,password, image)
					//VALUES('$fname','$fname', '$lname', '$gender', '$dob', '$nic', '$address', '$city', '$province', '$mobile', '$email', '$hashed_password', '$newfilename')";

					$query = "INSERT INTO admins (adminID,first_name,last_name,gender,dob,nic,address,city,province,mobile,Landline,email,password, image)
					VALUES ('".$_POST["a_adminId"]."','".$_POST["a_first_name"]."','".$_POST["a_last_name"]."','".$_POST["a_gender"]."','".$_POST["a_dob"]."','".$_POST["a_nic"]."','".$_POST["a_address"]."','".$_POST["a_city"]."','".$_POST["a_province"]."','".$_POST["a_mobile"]."','".$_POST["a_Landline"]."','".$_POST["a_email"]."','$hashed_password', '$newfilename')";


					//excute the query
    			$result = mysqli_query($conn, $query);

					// upload image
					$file_upload = move_uploaded_file($temp_name, $upload_path . $newfilename);

					//check databse query is success
					 if ($result && $file_upload) {
						echo "<script>alert('new registration successful')</script>";
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
  <title>Smart EE Checkup | Admins Sign Up</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		

	<?php include "component-header_a.php"; ?> <!-- ----------------------------- ( Header Section ) -------------------------------- -->
	  
</head>

	<?php include "dbconnect.php"; ?> <!-- ------------------------------------ ( DB Section ) ------------------------------------ -->


<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!-- start header -->
<!-- end header -->

<!-- start left sidebar -->
<!-- end   left sidebar --> 


<!-- start content -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- <section class="content"> -->
	<section class="content-header">
      <h1>
			New Admin Registration
        <small><!-- --></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Admin profile Mgm</a></li>
        <li><a href="#">New Admin Registration</a></li>
      </ol>
    </section>

    <div class="box-body">
	
	<div class="col-md-12 box box-default">
    
    <form enctype="multipart/form-data" method="post" accept-charset="utf-8" class="validateForm form-horizontal" action="signup_a.php">
    

    <!------------------------------------------------------------------- Fieldset 1 - Personal Information ------------------------------ -->
				<br><fieldset>
			
					
					<legend>Personal Information</legend>


					<div class="form-group">
					  <label class="control-label col-md-2" for="email">Admin ID<span class="text-danger"> *</span></label>
					  <div class="col-md-6">
						<div class="input text">
						  <input type="text" name="a_adminId" class="form-control validate[required]" id="" value="<?php echo "AID$randnum"; ?>">
						</div>
					  </div>
					</div>


					<div class="form-group">
					  <label class="control-label col-md-2" for="email">First Name<span class="text-danger"> *</span></label>
					  <div class="col-md-6">
						<div class="input text">
						  <input type="text" name="a_first_name" class="form-control validate[required]" id="" value="">
						</div>
					  </div>
					</div>

				  <div class="form-group">
					<label class="control-label col-md-2" for="email">Last Name<span class="text-danger"> *</span></label>
					<div class="col-md-6">
					  <div class="input text">
						<input type="text" name="a_last_name" class="form-control validate[required]" id="" value="">
					  </div>
					</div>
				  </div>

					<div class="form-group">
					<label class="control-label col-md-2" for="email">Gender<span class="text-danger"> *</span></label>
					<div class="col-md-6 checkbox">
					  <input type="hidden" name="a_gender" value="">
					  <label for="gender-male">
						<input type="radio" name="a_gender" value="male" id="gender-male" checked="checked">Male
					  </label>
					  <label for="gender-female">
						<input type="radio" name="a_gender" value="female" id="gender-female">Female
					  </label>
					</div>
				  </div>

					<div class="form-group">
						<label class="control-label col-md-2" for="email">Date of Birth<span class="text-danger"> *</span></label>
							<div class="col-md-6">

							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input type="text" name="a_dob" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
							</div>
							
							</div>
					</div> 
					
					<div class="form-group">
					<label class="control-label col-md-2" for="email">NIC Number<span class="text-danger"> *</span></label>
					<div class="col-md-6">
					  <div class="input text">
						<input type="text" name="a_nic" class="form-control validate[required]" id="" value="">
					  </div>
					</div>
				  </div>
			  
				</fieldset>
	<!------------------------------------------------------------------- Fieldset 2 - Contact Information ------------------------------ -->
				<fieldset>
		  
					<legend>Contact Information</legend>
					  
					  <div class="form-group">
						<label class="control-label col-md-2" for="email">Address<span class="text-danger"> *</span></label>
						<div class="col-md-6">
						  <div class="input text">
							<input type="text" name="a_address" class="form-control validate[required]" id="" value="">
						  </div>
						</div>
					  </div>

					  <div class="form-group">
						<label class="control-label col-md-2" for="email">City<span class="text-danger"> *</span></label>
						  <div class="col-md-6">
							<div class="input text">
							  <input type="text" name="a_city" class="form-control validate[required]" id="" value="">
							</div>
						  </div>
						</div>

						<div class="form-group">
						  <label class="control-label col-md-2" for="email">Province<span class="text-danger"> *</span></label>
						  <div class="col-md-6">
							<div class="input text">
							  <input type="text" name="a_province" class="form-control" id="" value="">
							</div>
						  </div>
						</div>

						<div class="form-group">
						  <label class="control-label col-md-2" for="email">Mobile Number<span class="text-danger"> *</span></label>
						  <div class="col-md-6">
							<div class="input-group">
								<div class="input-group">
									<div class="input-group-addon">+94</div>
									<input type="text" name="a_mobile" class="form-control" data-inputmask='"mask": "(99) 999-9999"' data-mask id="" value="" placeholder="7x xxx xxxx">
								</div>
							</div>
						  </div>
						</div>
						
												<div class="form-group">
						  <label class="control-label col-md-2" for="email">Landline Number<span class="text-danger"> *</span></label>
						  <div class="col-md-6">
							<div class="input-group">
								<div class="input-group">
									<div class="input-group-addon">+94</div>
									<input type="text" name="a_Landline" class="form-control" data-inputmask='"mask": "(99) 999-9999"' data-mask id="" value="" placeholder="xx xxx xxxx">
								</div>
							</div>
						  </div>
						</div>

				</fieldset>

	<!------------------------------------------------------------------- Fieldset 4 - Login Information ------------------------------ -->
                <fieldset>
				
					  <legend>Login Information</legend>

					  <div class="form-group">
						<label class="control-label col-md-2" for="email">Email<span class="text-danger"> *</span></label>
						<div class="col-md-6">
						  <div class="input text">
							<input type="text" name="a_email" class="form-control validate[required]" id="" value="">
						  </div>
						</div>
					  </div>

					<div class="form-group">
					  <label class="control-label col-md-2" for="email">Password<span class="text-danger"> *</span></label>
						<div class="col-md-6">
						  <input type="password" name="a_password" class="form-control validate[required]" value="">
						</div>
					  </div>

						<div class="form-group">
					  <label class="control-label col-md-2" for="email">Confirm Password<span class="text-danger"> *</span></label>
						<div class="col-md-6">
						  <input type="password" name="a_cpassword" class="form-control validate[required]" value="">
						</div>
					  </div>

					  <div class="form-group">
						<label class="control-label col-md-2" for="email">Display Image</label>
						  <div class="col-md-4">
							<input type="file" name="image" class="form-control" onchange="image($event);"><br>
						  </div>
						</div>
						
						
						<div class="form-group">
						<div class="col-md-12">
							<br>
							<button class="col-md-offset-0 btn btn-flat btn-success" name="submit" type="submit">Add Admin</button>
							<br>
						</div>
					  </div>
						
                </fieldset>
	
	
  </form>   

  </div>  
    
  </div>




  


      <!-- Your Page Content Here -->

    <!-- </section> -->
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
<!-- end   content -->


<!-- start footer -->

<!-- end   footer -->  


<!-- start right sidebar -->
<!-- end   right sidebar -->

</div>
<!-- ./wrapper -->

	<?php include "component-sidebar-left_a.php"; ?>
	<?php include "component-footer_a.php"; ?>
<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Page script -->
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

<script>

	function image(e) {
		console.log(e);
	}

</script>



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
<?php mysqli_close($conn); ?>