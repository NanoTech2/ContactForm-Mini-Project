<?php
 session_start();
//Database Configuration File
include('includes/config.php');
error_reporting(0);
if(isset($_POST['login']))
  {
 
    // Getting username and password
    $uname=$_POST['username'];
    $password=$_POST['password'];
    // Fetch data from database on the basis of username/email and password
    $sql ="SELECT UserName,Password FROM tbladmin WHERE (UserName=:usname)";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':usname', $uname, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach ($results as $row) {
$hashpass=$row->Password;
}
//verifying Password
if (password_verify($password, $hashpass)) {
$_SESSION['userlogin']=$_POST['username'];
    echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
  } else {
$wrongpassword="You entered wrong password.";
 
  }
}
//if username or email not found in database
else{
$wrongemail="User not registered with us.";
  }
 
}
?>


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>Admin Login
  </title>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/custom.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/pages/login-register.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body class="vertical-layout vertical-menu-modern 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="index.html">
            
              <h3 class="brand-text">CF(Contact Form) Admin</h3>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container">
        <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
          <ul class="nav navbar-nav">
            <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="../index.php"><i class="ficon ft-arrow-left"></i></a></li>
         
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                 Contact Form Admin Login
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Enter your details</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
 <?php if($wrongpassword):?>                   
<div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
<span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
<strong>Oh snap ! </strong> <?php echo htmlentities($wrongpassword); ?>
  </div>
<?php endif;?>

 <?php if($wrongemail):?>                   
<div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
<span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
<strong>Oh snap ! </strong> <?php echo htmlentities($wrongemail); ?>
  </div>
<?php endif;?>



<form class="form-horizontal" method="post">
                      

<fieldset class="form-group position-relative has-icon-left">
<input type="text" class="form-control input-lg" id="username" name="username" placeholder="Your Username" tabindex="1" required data-validation-required-message="Please enter your username.">
<div class="form-control-position"><i class="ft-user"></i>
</div>
<div class="help-block font-small-3"></div>
</fieldset>
                      

<fieldset class="form-group position-relative has-icon-left">
<input type="password" class="form-control input-lg" id="password" name="password" placeholder="Enter Password" tabindex="2" required data-validation-required-message="Please enter valid passwords.">
<div class="form-control-position"><i class="la la-key"></i></div>
<div class="help-block font-small-3"></div>
 </fieldset>
                      


                      

<button type="submit" class="btn btn-danger btn-block btn-lg" name="login"><i class="ft-unlock"></i> Login</button>
</form>
                  
</div>
</div>

              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer fixed-bottom footer-dark navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2021 <a class="text-bold-800 grey darken-2" href="https://phpgurukul.com"
        target="_blank">PHPGURUKUL </a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>