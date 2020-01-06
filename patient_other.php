<?php

		include_once "dbconnect.php";

		session_start(); 

		if (!isset($_SESSION['patientID'])) {
			header('Location: login_p.php');
		}

		$var_value = $_SESSION['patientID'];

		if(empty($var_value)){
			header('Location: login_p.php');
		}

		if(isset($_POST['submit1'])){

			$error =array();
      
			if(empty($error)){
          

			$sql = "UPDATE patientsod SET heart_disease='".$_POST['p_heart_disease']."',respiratory_disease='".$_POST['p_respiratory_disease']."',diabetes='".$_POST['p_diabetes']."',glaucoma='".$_POST['p_glaucoma']."',eye_injuries='".$_POST['p_eye_injuries']."', ear_injuries='".$_POST['p_ear_injuries']."' WHERE patientID='$var_value'";

			$result = mysqli_query($conn,$sql);
    

          
			if ($result) 
			{
				echo "Recode Added";
				echo '<script>alert("Your are successefully request for approval")</script>';
				header('Location: patient_other.php');
			}
			else
			{
				echo "<script>alert('Update failed')</script>";
			}
      } 
      else{
        echo "<script>alert('Fill the details correctly')</script>";
      }
			
			
		}

?>
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart EE Checkup | Patients Profile Update</title>
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
			Update Other Informations
        <small><!-- --></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Profile Management</a></li>
        <li><a href="#">Update Other Informations</a></li>
      </ol>
    </section>

    <div class="box-body">
	
	<div class="col-md-12 box box-default">
    
    <form enctype="multipart/form-data" method="post" accept-charset="utf-8" class="validateForm form-horizontal" action"patient_other.php">
    
		
		<?php
	
		include_once "dbconnect.php";
        $result = mysqli_query($conn,"SELECT * FROM patientsod WHERE patientID='$var_value'");
        while ($row = mysqli_fetch_array ($result)){

        ?>
		
		
		
    <!------------------------------------------------------------------- Fieldset 1 - Personal Information ------------------------------ -->
				<br><fieldset>
			
					
					<legend>Personal Information</legend>
					
					<div class="form-group">

					  <label class="control-label col-md-2" for="email">Patient ID<span class="text-danger"> *</span></label>
					  <div class="col-md-6">
						<div class="input text">
						  <input type="text" name="p_patientID" class="form-control"  id="" value="<?php echo $row ['patientID']; ?>" disabled>
						</div>
					  </div>
					</div>

<fieldset></fieldset>

				<div class="form-group">
				 <label class="control-label col-md-2" for="email">Having Heart Disease ? <span class="text-danger"> *</span></label>
				  <div class="col-md-6 checkbox">
				   <input type="hidden" name="p_heart_disease" value="" disabled>
				    <label for="gender-male">
					   <input type="radio" name="p_heart_disease" value="No" id="p_heart_disease" <?php if($row ['heart_disease']=="No"){ ?>checked="checked"<?php }?>>No
					</label>
					<label for="gender-female">
						<input type="radio" name="p_heart_disease" value="Yes" id="p_heart_disease" <?php if($row ['heart_disease']=="Yes"){ ?>checked="checked"<?php }?>>Yes
					</label>
				  </div>
				</div>

<fieldset></fieldset>
				
				<div class="form-group">
				 <label class="control-label col-md-2" for="email">Having Respiratory Disease ? <span class="text-danger"> *</span></label>
				  <div class="col-md-6 checkbox">
				   <input type="hidden" name="p_respiratory_disease" value="" disabled>
				    <label for="gender-male">
					   <input type="radio" name="p_respiratory_disease" value="No" id="p_respiratory_disease" <?php if($row ['respiratory_disease']=="No"){ ?>checked="checked"<?php }?>>No
					</label>
					<label for="gender-female">
						<input type="radio" name="p_respiratory_disease" value="Yes" id="p_respiratory_disease" <?php if($row ['respiratory_disease']=="Yes"){ ?>checked="checked"<?php }?>>Yes
					</label>
				  </div>
				</div>

<fieldset></fieldset>

				<div class="form-group">
				 <label class="control-label col-md-2" for="email">Having Diabetes ? <span class="text-danger"> *</span></label>
				  <div class="col-md-6 checkbox">
				   <input type="hidden" name="p_diabetes" value="" disabled>
				    <label for="gender-male">
					   <input type="radio" name="p_diabetes" value="No" id="p_heart_disease" <?php if($row ['diabetes']=="No"){ ?>checked="checked"<?php }?>>No
					</label>
					<label for="gender-female">
						<input type="radio" name="p_diabetes" value="Yes" id="p_heart_disease" <?php if($row ['diabetes']=="Yes"){ ?>checked="checked"<?php }?>>Yes
					</label>
				  </div>
				</div>
				
				<div class="form-group">
				 <label class="control-label col-md-2" for="email">Having Glaucoma ? <span class="text-danger"> *</span></label>
				  <div class="col-md-6 checkbox">
				   <input type="hidden" name="p_glaucoma" value="" disabled>
				    <label for="gender-male">
					   <input type="radio" name="p_glaucoma" value="No" id="p_glaucoma" <?php if($row ['glaucoma']=="No"){ ?>checked="checked"<?php }?>>No
					</label>
					<label for="gender-female">
						<input type="radio" name="p_glaucoma" value="Yes" id="p_glaucoma" <?php if($row ['glaucoma']=="Yes"){ ?>checked="checked"<?php }?>>Yes
					</label>
				  </div>
				</div>
				
				<div class="form-group">
				 <label class="control-label col-md-2" for="email">Having Eye Injuries ? <span class="text-danger"> *</span></label>
				  <div class="col-md-6 checkbox">
				   <input type="hidden" name="p_eye_injuries" value="" disabled>
				    <label for="gender-male">
					   <input type="radio" name="p_eye_injuries" value="No" id="p_eye_injuries" <?php if($row ['eye_injuries']=="No"){ ?>checked="checked"<?php }?>>No
					</label>
					<label for="gender-female">
						<input type="radio" name="p_eye_injuries" value="Yes" id="p_eye_injuries" <?php if($row ['eye_injuries']=="Yes"){ ?>checked="checked"<?php }?>>Yes
					</label>
				  </div>
				</div>
				
				<div class="form-group">
				 <label class="control-label col-md-2" for="email">Having Ear Injuries ? <span class="text-danger"> *</span></label>
				  <div class="col-md-6 checkbox">
				   <input type="hidden" name="p_ear_injuries" value="" disabled>
				    <label for="gender-male">
					   <input type="radio" name="p_ear_injuries" value="No" id="p_ear_injuries" <?php if($row ['ear_injuries']=="No"){ ?>checked="checked"<?php }?>>No
					</label>
					<label for="gender-female">
						<input type="radio" name="p_ear_injuries" value="Yes" id="p_ear_injuries" <?php if($row ['ear_injuries']=="Yes"){ ?>checked="checked"<?php }?>>Yes
					</label>
				  </div>
				</div>

			  
				</fieldset>

	<!------------------------------------------------------------------- Fieldset 5 - More Information ------------------------------ -->
                <fieldset>
				
					<?php
							}
							?>
					  <div class="form-group">
						<div class="col-md-12">
							<br>
							<button class="col-md-offset-0 btn btn-flat btn-success" name="submit1" type="submit">Update details</button>
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




<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
