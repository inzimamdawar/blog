<?php 
require_once '../includes/config.php';

if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql = "DELETE FROM posts WHERE post_id = $id";
    $result = mysqli_query($con, $sql);
    if($result){
    echo '<script> alert("post deleted successfully"); </script>';
    header('location:index.php');
   }
}
?>