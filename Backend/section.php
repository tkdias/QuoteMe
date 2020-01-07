
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart EE Checkup | Platform</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/mdb/css/bootstrap.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="bootstrap/mdb/css/style.css" rel="stylesheet">
  
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/iCheck/square/blue.css">
	
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body img src="dist/img/img_gym/Background.jpg">

<div class="login-box">
  <div class="login-logo">
    <!-- <a href="index.php">UNIVERSAL<b> GYM</b></a> -->
	<a href="index.php"><font size="6" color="#FFFFFF" class="animated fadeInDownBig" align="center" >Automated Centralized Smart EE Checkup
Portal Network System</font></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Please choose the Platform you need to access</p>


<!--*********************************************************************-->


    <form action="login.php" method="post">

    <div class="form-group has-feedback">
      <a href="login_p.php"><button type="button" class="btn btn-block btn bg-navy btn-flat">PATIENT</button></a>
      </div>

      <div class="form-group has-feedback">
      <a href="login_d.php"><button type="button" class="btn btn-block btn bg-navy btn-flat">DOCTOR</button></a>
      </div>

      <div class="form-group has-feedback">
      <a href="login_a.php"><button type="button" class="btn btn-block btn bg-navy btn-flat">ADMIN</button></a>
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

</body>
</html>
