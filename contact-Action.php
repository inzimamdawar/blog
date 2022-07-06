<?php   require_once 'includes/config.php'; 
        session_start();
?>
<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

   $sql = "INSERT INTO contactus(name,email,phone,subject,message) VALUES('$name','$email','$phone','$subject','$message')";
    echo $result=mysqli_query($con, $sql);
    if ($result) {
        $_SESSION['success']= 'We will contact you with in 1 hour';
        header('location:contact-us.php');
}
if(!$result){
    $_SESSION['error']= 'Something went wrong! Please check your info';
    header('location:contact-us.php');
}
}
?>