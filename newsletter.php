<?php session_start();
  require_once 'includes/config.php'; 
        
?>
<?php

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
   

   $sql = "INSERT INTO newsletter(email) VALUES('$email')";
     $result=mysqli_query($con, $sql);

    if ($result) {
        $_SESSION['success']= 'Email sent successfully';
        header('location:index.php#newsMsg');
}
if(!$result){
    $_SESSION['error']= 'Something went wrong! Please check your Email';
    header('location:index.php#newsMsg');
}
}
?>