<?php

//create session
session_start();

// import database connection file
require_once('dbconnect.php');

// check user clicked login button
if (isset($_POST['submit'])) {
    
    // create array to store errors
    $error = array();
    
    // check user entered email & password
    if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
        $error[] = 'Username is Missing / Invalid';
    }
    
    if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
        $error[] = 'Password is Missing / Invalid';
    }
    
    // check any error in this form
    if (empty($error)) {
        
        // save user email & password into varibale
        $email           = $_POST['email'];
        $password        = $_POST['password'];
        $hashed_password = sha1($password);
        
        // create database query
        $query = "SELECT * FROM admins WHERE email ='$email' AND password = '$hashed_password'";
        
        //excute the query
        $result = mysqli_query($conn, $query);
        
        //databse query is success
        if ($result) {
            
            // valid user found
            if (mysqli_num_rows($result) == 1) {
                
                //fetch logged user data
                $user = mysqli_fetch_assoc($result);
                
                // store fetch data to session
                
                $_SESSION['adminID']       = $user['adminID'];
                $_SESSION['first_name']    = $user['first_name'];
                $_SESSION['last_name']     = $user['last_name'];
                $_SESSION['profile_image'] = $user['image'];
                $_SESSION['email']         = $user['email'];
                $_SESSION['nic']           = $user['nic'];
                $_SESSION['JoinDate']      = $user['JoinDate'];
                
                //redirect to the admin home page
                header('Location: home_a.php');
            } else {
                
                //user email or password invalid
                $error = 'Invalid Email / Password';
                
            }
        } else {
            
            // found system error
            $error = 'System Error';
        }
        
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Smart EE Checkup | Admin Sign In</title>
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
    <p class="login-box-msg">Sign in to access your dashboard</p>


<!--*********************************************************************-->
    <?php
if (isset($error) && !empty($error)) {
    echo "<p class='login-error' style='color:red;'>$error</p>";
}
?>

    <form action="login_a.php" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control"  name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
        <button type="submit" name="submit" class="btn btn-block btn bg-navy btn-flat">Sign In</button>
    </form>


<!--*******************************************************************-->

<div class="social-auth-links">
    <a href="section.php" class="text-center"><b>Back</b></a>
    </div>


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

<?php
mysqli_close($conn);
?>