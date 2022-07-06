
<?php    session_start();
include_once 'includes/config.php';
?>


<!-- show comments -->
<?php
    // if(isset($_POST['post_id'])){
    //     $post_id = $_POST['post_id'];
    // }
    

    // $cmnt_sql = "SELECT * FROM comments INNER JOIN  posts ON comments.post_id = posts.post_id ORDER BY comment_id LIMIT 20"; 
    // $cmnt_result = mysqli_query($con, $cmnt_sql);
    // $output = "";
    // if(mysqli_num_rows($cmnt_result) > 0){

    //     while($cmnt_row=mysqli_fetch_assoc($cmnt_result)){
        
    //         $output = '<div class="media">
               
    //             <div class="media-body">
    //                 <h4 class="media-heading user_name">'.$cmnt_row['comment_user_name'].'<small>'.date('F jS, Y',strtotime($cmnt_row['created_at'])).'</small></h4>
    //                 <p>'.$cmnt_row['comment'].'</p>
    //                 <!-- <a href="#" class="btn btn-primary btn-sm">Reply</a> --> ';
    //                 $output .= '</div>';
                
                    
    //      }
    //      echo $output;
    
    //  }else{
    //      echo "Record not found";
    //  }


     
//      ?>
//      <?php
    include_once 'includes/config.php';
    if (isset($_POST['submit'])) {

    // $id = $_POST['id'];
    $cmnt_name = $_POST['name'];
    $cmnt_email = $_POST['email'];
    $comment = $_POST['comment'];
    $created_at = time();

    $sql = "INSERT INTO comments(comment_user_name, email, comment, created_at)
    VALUES('$cmnt_name','$cmnt_email', '$comment', now())";
   

    $result = mysqli_query($con, $sql);
    if($result){
        $_SESSION['success']= "Comment submited successfully";
        header('location:singlePost.php');

    }
    if(!$result){
        $_SESSION['error']= "Something went wrong";
        header('location:singlePost.php');
       
    }
 }

   ?> 




   
