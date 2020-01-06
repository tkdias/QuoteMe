<?php

			//create session
			session_start();

			// import database connection file
			require_once('dbconnect.php');
			
			$randnumint=rand(100000,999999);
			$randnum = (string)$randnumint;

			//check user is logged
			if (!isset($_SESSION['first_name'])) {
				header('Location: login_p.php');
      }
      
      $var_value = $_SESSION['patientID'];
      $nicno = $_SESSION['nic'];
      $eemail = $_SESSION['email'];
			
			// check user clicked login button
			if (isset($_POST['submit'])) {
				
				 // create array to store errors
				 $error = array();

				
				// check any error in this form
				if (empty($error)) {
					// save user email & password into varibale
				//$fname = $_POST['portalID'];

        $poidd = $_POST['portalID'];
        $datee = $_POST['appointmentDate'];
        $timee = $_POST['appointmentTime'];
				$email = "tkdias7@gmail.com";
				$message = "You have made an appoinment on $datee at $timee";
				$subject = "Sent From Smart EE Checkup Portal";
        $from = "From: $email<$email>\r\nReturn-path: $email";

        //$status = "1";
					
					$query = "INSERT INTO appointments (appointmentID,patientID,portalID,checkuptype,appointmentDate,appointmentTime)
          VALUES ('".$_POST["appointmentID"]."','".$_POST["patientID"]."','".$_POST["portalID"]."','".$_POST["checkuptype"]."','".$_POST["appointmentDate"]."','".$_POST["appointmentTime"]."')";

          //$queryex = "UPDATE portals SET traffic=traffic+1 WHERE portalID = '$poidd'";
					//excute the query
    			$result = mysqli_query($conn, $query);


					//check databse query is success
					 if ($result) {
            mail($eemail, $subject, $message, $from);
						echo "<script>alert('New Appoinment successfully added')</script>";
					}
					else{
						echo "<script>alert('New Appoinment request failed')</script>";
          }
          
          $queryex = "UPDATE portals SET traffic=traffic+1 WHERE portalID = '$poidd'";
    			$resultex = mysqli_query($conn, $queryex);

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
  <title>Smart EE Checkup | Appointment Management</title>
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
		

	<?php include "component-header_p.php"; ?> <!-- ----------------------------- ( Header Section ) -------------------------------- -->
	  
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
			Add New Appointment
        <small><!-- --></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Appointment Management</a></li>
        <li><a href="#">Add New Appointment</a></li>
      </ol>
    </section>

    <div class="box-body">

    
		<?php
	
  include_once "dbconnect.php";
      //$poid = "PTL612286";
      $resulttt = mysqli_query($conn,"SELECT * FROM portals LIMIT 1");
      while ($row = mysqli_fetch_array ($resulttt)){

      ?>
	<!------------------------------------------------------------------------------------------------------ -->
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-map-pin"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Portal Name : <?php echo $row ['hospital']; ?></span>
              <span class="info-box-number">Portal ID : <?php echo $row ['portalID']; ?></span>
			  <span class="info-box-number">Traffic : <?php echo $row ['traffic']; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-map-pin"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Portal Name : </span>
              <span class="info-box-number">Portal ID :</span>
			  <span class="info-box-number">Traffic :</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-map-pin"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Portal Name : </span>
              <span class="info-box-number">Portal ID :</span>
			  <span class="info-box-number">Traffic :</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
      </div>
	<!------------------------------------------------------------------------------------------------------ -->
  <?php
							}
							?>
	<div class="col-md-12 box box-default">
    
    <form enctype="multipart/form-data" method="post" accept-charset="utf-8" class="validateForm form-horizontal" action="appointment_p_form.php">
    
    <!------------------------------------------------------------------- Fieldset 1 - Personal Information ------------------------------ -->
				<br><fieldset>
			
					
					<legend>Informations</legend>


					<div class="form-group">
					  <label class="control-label col-md-2" for="email">Appointment ID<span class="text-danger"> *</span></label>
					  <div class="col-md-6">
						<div class="input text">
						  <input type="text" name="appointmentID" class="form-control validate[required]" id="" value="<?php echo "APID$randnum"; ?>">
						</div>
					  </div>
					</div>

          <div class="form-group">
					  <label class="control-label col-md-2" for="email">Patient ID<span class="text-danger"> *</span></label>
					  <div class="col-md-6">
						<div class="input text">
						  <input type="text" name="patientID" class="form-control validate[required]" id="" value="<?php echo $var_value; ?>">
						</div>
					  </div>
					</div>

          <div class="form-group">
					  <label class="control-label col-md-2" for="email">Portal ID<span class="text-danger"> *</span></label>
					  <div class="col-md-6">
						<div class="input text">
						  <input type="text" name="portalID" class="form-control validate[required]" id="" value="">
						</div>
					  </div>
					</div>

					<div class="form-group">
					  <label class="control-label col-md-2" for="email">Checkup type<span class="text-danger"> *</span></label>
					  <div class="col-md-6">
						<div class="input text">
						  

            <input type="hidden" name="checkuptype" class="form-control" value="" placeholder="checkuptype">
		        <label for="gender-male">
			      <input type="radio" name="checkuptype" value="Vision" id="Vision" checked="checked"> Vision checkup
            </label>
            <label for="gender-female">
			      <input type="radio" name="checkuptype" value="Hearing" id="Hearing"> Hearing checkup
            </label>
		        <label for="gender-female">
			      <input type="radio" name="checkuptype" value="Both" id="Both"> Both checkups
            </label>



						</div>
					  </div>
					</div>

          <div class="form-group">
						<label class="control-label col-md-2" for="email">Appointment Date<span class="text-danger"> *</span></label>
							<div class="col-md-6">

							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input type="text" name="appointmentDate" class="form-control" value="" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask >
							</div>
							</div>
					</div> 

          <div class="form-group">
					  <label class="control-label col-md-2" for="email">Appointment Time<span class="text-danger"> *</span></label>
					  <div class="col-md-6">
						<div class="input text">
						  <input type="text" name="appointmentTime" class="form-control validate[required]" id="" value="09.00">
						</div>
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="control-label col-md-2" for="email"><span class="text-danger"></span></label>
					  <div class="col-md-6">
						<div class="input text">
					      <button class="col-md-offset-0 btn btn-flat btn-success" name="submit" type="submit">Submit</button>
						</div>
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

	<?php include "component-sidebar-left_p.php"; ?>
	<?php include "component-footer_p.php"; ?>
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