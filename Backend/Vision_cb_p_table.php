<?php

//create session
session_start();

// import database connection file
require_once('dbconnect.php');

//check user is logged
if (!isset($_SESSION['first_name'])) {
    header('Location: login_p.php');
}

$var_value = $_SESSION['patientID'];

$list = "";

$defect = "";

$defectTB = 0;
$defectRG = 0;
$defectPR = 0;
$defectDE = 0;

$op01 = 12; //Normal & all sort of colour vision deficiencies read it as 12
$op02 = 8; //Red-green deficiencies read as 3  | Total Colour blindness cannot read anything = 0
$op03 = 29; //Red-green deficiencies read as 70 | Total Colour blindness cannot read anything = 0
$op04 = 5; //Red-green deficiencies read as 2  | Total Colour blindness cannot read anything = 0
$op05 = 3; //Red-green deficiencies read as 5  | Total Colour blindness cannot read anything = 0
$op06 = 15; //Red-green deficiencies read as 17  | Total Colour blindness cannot read anything = 0
$op07 = 74; //Red-green deficiencies read as 21  | Total Colour blindness cannot read anything = 0
$op08 = 6; //Colour blindness cannot read anything or read them incorrectly = 0 or ?
$op09 = 45; //Colour blindness cannot read anything or read them incorrectly = 0 or ?
$op10 = 5; //Colour blindness cannot read anything or read them incorrectly = 0 or ?
$op11 = 7; //Colour blindness cannot read anything or read them incorrectly = 0 or ?
$op12 = 16; //Colour blindness cannot read anything or read them incorrectly = 0 or ?
$op13 = 73; //Colour blindness cannot read anything or read them incorrectly = 0 or ?
$op14 = 0; //Red-green deficiencies read as 5
$op15 = 0; //Red-green deficiencies read as 45
$op16 = 26; //Protanopia & stong protanomia read as 6 | Deuteranopia & stong Deuteranomalia as 2
$op17 = 42; //Protanopia & stong Protanopia read as 2 | Deuteranopia & stong Deuteranomalia as 4


// create database query
$query = "SELECT * FROM vtestcb WHERE patientID='$var_value'";

//excute the query
$result = mysqli_query($conn, $query);

//Store excuted data 
while ($row = mysqli_fetch_array($result)) {
    
    $p01 = $row['p01'];
    $p02 = $row['p02'];
    $p03 = $row['p03'];
    $p04 = $row['p04'];
    $p05 = $row['p05'];
    $p06 = $row['p06'];
    $p07 = $row['p07'];
    $p08 = $row['p08'];
    $p09 = $row['p09'];
    $p10 = $row['p10'];
    $p11 = $row['p11'];
    $p12 = $row['p12'];
    $p13 = $row['p13'];
    $p14 = $row['p14'];
    $p15 = $row['p15'];
    $p16 = $row['p16'];
    $p17 = $row['p17'];
    
    //==========================level 01================
    if ($p01 == $op01) {
        $level01 = 12;
    } else {
        $level01 = 0;
        $defectTB++;
    }
    //==========================level 02================
    if ($p02 == $op02) {
        $level02 = 8;
    } elseif ($p02 == 3) {
        $level02 = 3;
        $defectRG++;
    } else {
        $level02 = 0;
        $defectTB++;
    }
    //==========================level 03================
    if ($p03 == $op03) {
        $level03 = 29;
    } elseif ($p03 == 70) {
        $level03 = 70;
        $defectRG++;
    } else {
        $level03 = 0;
        $defectTB++;
    }
    //==========================level 04================
    if ($p04 == $op04) {
        $level04 = 5;
    } elseif ($p04 == 2) {
        $level04 = 2;
        $defectRG++;
    } else {
        $level04 = 0;
        $defectTB++;
    }
    //==========================level 05================
    if ($p05 == $op05) {
        $level05 = 3;
    } elseif ($p05 == 5) {
        $level05 = 5;
        $defectRG++;
    } else {
        $level05 = 0;
        $defectTB++;
    }
    //==========================level 06================
    if ($p06 == $op06) {
        $level06 = 15;
    } elseif ($p06 == 17) {
        $level06 = 17;
        $defectRG++;
    } else {
        $level06 = 0;
        $defectTB++;
    }
    //==========================level 07================
    if ($p07 == $op07) {
        $level07 = 74;
    } elseif ($p07 == 21) {
        $level07 = 21;
        $defectRG++;
    } else {
        $level07 = 0;
        $defectTB++;
    }
    //==========================level 08================
    if ($p08 == $op08) {
        $level08 = 6;
    } else {
        $level08 = 0;
        $defectRG++;
        $defectPR++;
        $defectDE++;
        $defectTB++;
    }
    //==========================level 09================
    if ($p09 == $op09) {
        $level09 = 45;
    } else {
        $level09 = 0;
        $defectRG++;
        $defectPR++;
        $defectDE++;
        $defectTB++;
    }
    //==========================level 10================
    if ($p10 == $op10) {
        $level10 = 5;
    } else {
        $level10 = 0;
        $defectRG++;
        $defectPR++;
        $defectDE++;
        $defectTB++;
    }
    //==========================level 11================
    if ($p11 == $op11) {
        $level11 = 7;
    } else {
        $level11 = 0;
        $defectRG++;
        $defectPR++;
        $defectDE++;
        $defectTB++;
    }
    //==========================level 12================
    if ($p12 == $op12) {
        $level12 = 16;
    } else {
        $level12 = 0;
        $defectRG++;
        $defectPR++;
        $defectDE++;
        $defectTB++;
    }
    //==========================level 13================
    if ($p13 == $op13) {
        $level13 = 73;
    } else {
        $level13 = 0;
        $defectRG++;
        $defectPR++;
        $defectDE++;
        $defectTB++;
    }
    //==========================level 014================
    if ($p14 == $op14) {
        $level14 = 0;
    } elseif ($p14 == 5) {
        $level14 = 5;
        $defectRG++;
    } else {
        $level14 = 0; //??????????????????????
        //$defectTB ++;//????????????????????
    }
    //==========================level 015================
    if ($p15 == $op15) {
        $level15 = 0;
    } elseif ($p15 == 45) {
        $level15 = 45;
        $defectRG++;
    } else {
        $level15 = 0; //?????????????????????
        //$defectTB ++;//?????????????????????
    }
    //==========================level 016================
    if ($p16 == $op16) {
        $level16 = 26;
    } elseif ($p16 == 2) {
        $level16 = 2;
        $defectDE++;
    } elseif ($p16 == 6) {
        $level16 = 6;
        $defectPR++;
    } else {
        $level16 = 0;
        $defectTB++;
    }
    //==========================level 017================
    if ($p17 == $op17) {
        $level17 = 42;
    } elseif ($p17 == 4) {
        $level17 = 4;
        $defectDE++;
    } elseif ($p17 == 2) {
        $level17 = 2;
        $defectPR++;
    } else {
        $level17 = 0;
        $defectTB++;
    }
    
    $defectlevelTB = ($defectTB / 15) * 100;
    $defectlevelRG = ($defectRG / 14) * 100;
    $defectlevelPR = ($defectPR / 2) * 100;
    $defectlevelDE = ($defectDE / 2) * 100;
    
    $list .= "<tr>";
    $list .= "<td>" . $row['testID'] . "</td>";
    $list .= "<td>" . $row['patientID'] . "</td>";
    $list .= "<td>" . date('Y-m-d', strtotime($row['dateoftest'])) . "</td>";
    $list .= "<td>" . $row['portalID'] . "</td>";
    $list .= "<td>" . $defectlevelRG . " %" . "</td>";
    $list .= "<td>" . $defectlevelPR . " %" . "</td>";
    $list .= "<td>" . $defectlevelDE . " %" . "</td>";
    $list .= "<td>" . $defectlevelTB . " %" . "</td>";
    $list .= "</tr>";
    
    $defectTB = 0;
    $defectRG = 0;
    $defectPR = 0;
    $defectDE = 0;
    
}

//check user clicked delete button

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart EE Checkup | Vision - Colour Blindness</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
<!-- Start: CSS & Fonts --> 
  
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
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<!-- end: CSS & Font -->
        

    <?php
include "component-header_p.php";
?> <!-- ----------------------------- ( Header Section ) -------------------------------- -->
      
</head>

    <?php
include "dbconnect.php";
?> <!-- ------------------------------------ ( DB Section ) ------------------------------------ -->


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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
             View Colour Blindness Vision Information
        <small><!-- --></small>
      </h1>
      <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Vision Checkup</a></li>
        <li><a href="#">Colour Blindness test</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
           <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Test ID</th>
                    <th>Patient ID</th>
                    <th>Attended Date</th>
                    <th>Portal ID</th>
                    <th>Red-green deficiencies</th>
                    <th>Protanopia / stong protanomia</th>
                    <th>Deuteranopia / stong Deuteranomalia</th>
                    <th>Total Colour blindness</th>
                </tr>
                </thead>
                <tbody>
                     <?php
echo $list;
?>
              </tbody>
                <tfoot>
                <tr>
                <th></th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
 
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
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

    <?php
include "component-sidebar-left_p.php";
?>
  <?php
include "component-footer_p.php";
?>
  
<!-- REQUIRED JS SCRIPTS -->
<!-- start: JavaScript-->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
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
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>


<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
    
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

<!-- Optionally, you can add Slimscroll and FastClick plugins.Both of these plugins are recommended to enhance the user experience. -->

<!-- end: JavaScript-->

</body>
</html>
<?php
mysqli_close($conn);
?>