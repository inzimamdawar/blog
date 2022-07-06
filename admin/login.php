<?php 
require_once "../includes/config.php";
session_start();
if(isset($_SESSION['isUserLoggedIn']) && $_SESSION['isUserLoggedIn']){
  header('location:index.php');
  exit;

}
if(isset($_POST['login'])):
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password =mysqli_real_escape_string($con,$_POST['password']);

  $sql = "SELECT * FROM admins WHERE admin_email='$email' AND admin_password='$password'";
  $result = mysqli_query($con, $sql);
  if(mysqli_num_rows($result) >0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['isUserLoggedIn']= true;
    $_SESSION['LOGIN_USER_ID']= $row['admin_id'];
    $_SESSION['LOGIN_USER_NAME']= $row['admin_name'];
    $_SESSION['email']= $email;
    header('location:index.php');
    exit();
    
  }else{
    echo "<script> alert('Check your Email or password!') </script>";
  }

endif;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>tech blog admin panel</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="email" class="form-control" name="email" placeholder="Email" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        
        <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>
            </div>
    </form>
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
  </div>


</body>

</html>
