<?php include_once 'includes/header.php';  include_once 'includes/config.php';
                    session_start();
            
?>

    <div id="wrapper">
        <header class="tech-header header">
            <div class="container-fluid">
                <!-- Navbar start -->
               <?php include_once 'includes/navbar.php'; ?>
                <!-- Navbar End -->
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->

        <section class="section single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                       <?php 
                            
                           $post_id = $_GET['id'];
                           $sql = "SELECT * FROM posts INNER JOIN categories ON posts.category_id = categories.cat_id INNER JOIN admins ON posts.author_id=admins.admin_id limit 1"; //inner join users on posts.user_id=users.user_id
                           $result = mysqli_query($con, $sql);
                           $singlePost = mysqli_fetch_assoc($result);

                           // page view code start
                           $views= $singlePost['post_views'];
                           $sql = "UPDATE posts SET post_views=$views+1 WHERE post_id='$post_id'";
                           $result = mysqli_query($con, $sql);
                        //    page view code end
                            
                           ?>
                        <div class="page-wrapper">
                            <div class="blog-title-area text-center">
                                <ol class="breadcrumb hidden-xs-down">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                    <li class="breadcrumb-item active"><?php echo $singlePost['post_title'];?></li>
                                </ol>

                                <span class="color-orange"><a href="category.php?cat_id=<?php echo $singlePost['cat_id']; ?>" title=""><?php echo $singlePost['category_name'];?></a></span>

                                <h3><?php echo $singlePost['post_title'];?></h3>

                                <div class="blog-meta big-meta">
                                    <small><a href="singlePost.php?id=<?php echo $singlePost['post_id']; ?>" title=""><?php echo date('F jS, Y', strtotime($singlePost['created_at'])); ?></a></small>
                                            <small>By MR. <a href="admins.php?id=<?php echo $singlePost['admin_id']; ?>" title=""><?php echo $singlePost['admin_name']; ?></a></small>
                                    <small><a href="#" title=""><i class="fa fa-eye"></i><?php echo $singlePost['post_views'];?></a></small>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <!-- <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Share on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul> -->
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="assets/images/posts/<?php echo $singlePost['post_img']; ?>" alt="" class="img-fluid">
                            </div><!-- end media -->

                            <div class="blog-content">  
                                <div class="pp">
                                    <?php echo $singlePost['post_description']; ?>                       
                                </div><!-- end pp -->
                                
                            </div><!-- end content -->

                            <div class="blog-title-area">
                                <div class="tag-cloud-single">
                                    <span>Tags</span>

                                    <small><a href="#" title=""><?php echo $singlePost['tags'] ?></a></small>
                                    <small><a href="#" title="">colorful</a></small>
                                    <small><a href="#" title="">trending</a></small>
                                    <small><a href="#" title="">another tag</a></small>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <!-- <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul> -->
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-spot clearfix">
                                        <div class="banner-img">
                                            <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                                        </div><!-- end banner-img -->
                                    </div><!-- end banner -->
                                </div><!-- end col -->
                            </div><!-- end row -->

                            <hr class="invis1">

                            <div class="custombox prevnextpost clearfix">
                                <div class="row">
                             <?php
                           
                           $rsql = "SELECT * FROM posts INNER JOIN categories ON posts.category_id = categories.cat_id ORDER BY post_id DESC LIMIT 2"; //inner join users on posts.user_id=users.user_id
                           $rresult = mysqli_query($con, $rsql);
                           while ($rrow = mysqli_fetch_assoc($rresult)) { ?>
                                <div class="col-lg-6">
                                        <div class="blog-list-widget">
                                            <div class="list-group">
                                                <a href="singlePost.php?id=<?=$rrow['post_id']?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="w-100 justify-content-between text-right">
                                                        <img src="assets/images/posts/<?=$rrow['post_img']?>" alt="" class="img-fluid float-right">
                                                        <h5 class="mb-1" ><?php echo $rrow['post_title']; ?></h5>
                                                        <small>Prev Post</small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                 </div>
                                    <!-- end col -->

                           <?php }
                           ?>
                                   
                                    <!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">

                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">About author</h4>
                                <div class="row">
                                <?php
                                        $adminsql="SELECT * FROM admins";
                                        $adminResult=mysqli_query($con, $adminsql);
                                       $admin = mysqli_fetch_assoc($adminResult);

                                        ?>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="assets/images/posts/<?=$admin['admin_img']?>" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->
                                   
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="admins.php?id=<?=$admin['admin_id']?>""><?=$admin['admin_name']?></a></h4>
                                        <p><?=$admin['admin_description']?> <a href="#"><?=$admin['admin_website']?></a></p>

                                        <div class="topsocial">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">You may also like</h4>
                                <div class="row">
                            <?php
                            $cat_id = $singlePost['category_id'];
                           
                           $csql = "SELECT * FROM posts INNER JOIN categories ON posts.category_id = categories.cat_id WHERE category_id = '$cat_id' LIMIT 2"; //inner join users on posts.user_id=users.user_id
                           $cresult = mysqli_query($con, $csql);
                           while ($catrow = mysqli_fetch_assoc($cresult)) { ?>
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="singlePost.php?id=<?php echo $catrow['post_id']; ?>" title="">
                                                    <img src="assets/images/posts/<?php echo $catrow['post_img']; ?>" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                <h4><a href="singlePost.php?id=<?php echo $catrow['post_id']; ?>" title=""><?php echo $catrow['post_title']; ?></a></h4>
                                                <small><a href="category.php?cat_id=<?php echo $catrow['cat_id']; ?>"> <?php echo $catrow['category_name']; ?></a></small>
                                                <small><a href="singlePost.php?id=<?php echo $catrow['post_id']; ?>" title=""><?php echo date('F jS, Y', strtotime($catrow['created_at'])); ?></a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                            <?php } ?>
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">
                            
                            <!-- comments show Here start -->
                            <?php 
                            $cmnt_sql1 = "SELECT * FROM comments WHERE post_id='$post_id' LIMIT 20"; 
                            $cmnt_result1 = mysqli_query($con, $cmnt_sql1);
                            // print_r($cmnt_result1);
                            $comment_count = mysqli_num_rows($cmnt_result1);
                            // echo $comment_count;
                            ?>
                            
                            <div class="custombox clearfix">
                                <h4 class="small-title"><?php if (!is_null($comment_count)) { 

                                                                        echo $comment_count;

                                                                         } else { 
                                                                             
                                                                            echo '0';
                                                                         } 

                                                                         ?> Comments</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list" id="table-data">
                                        <?php
                                            $cmnt_sql = "SELECT * FROM comments WHERE post_id = '$post_id' ORDER BY comment_id DESC LIMIT 20"; 
                                            $cmnt_result = mysqli_query($con, $cmnt_sql);
                                            while($cmnt_row=mysqli_fetch_assoc($cmnt_result)){
                                            ?>
                                            <div class="media">
                                            <a class="media-left" href="#">
                                                    <img src="assets/images/posts/<?php echo $cmnt_row['post_img']; ?>" alt="User image" class="rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name"><?php echo $cmnt_row['comment_user_name']; ?><small><?php echo date('F jS, Y',strtotime($cmnt_row['created_at'])); ?></small></h4>
                                                    <p><?php echo $cmnt_row['comment']; ?></p>
                                                    <!-- <a href="#" class="btn btn-primary btn-sm">Reply</a> -->
                                                 </div>
                                                
                                            </div>

                                            <?php
                                        } 
                                        ?> 

                                        </div>
                                    </div><!-- end col -->
                                    <!-- comments show Here End -->        
                                </div><!-- end row -->
                            </div><!-- end custom-box -->
                            
                            <hr class="invis1">

                              <!-- comments form  start -->
                
                            <div class="custombox clearfix">
                                <div id="commentMsg">
                            <!--Show alert msg here -->
                                <?php 
                                if(isset($_SESSION['success'])){
                                    echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>';
                                    unset($_SESSION['success']);
                                }
                                if(isset($_SESSION['error'])){
                                    echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
                                    unset($_SESSION['error']);
                                }
                                ?>
                            
                                </div>
                            <!--Show alert msg here -->
                           
                             

                                <h4 class="small-title">Leave a Reply</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-wrapper" id="addForm" method="POST" action="commentAction.php">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                                            <input type="hidden" class="form-control" name="id" >
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email address">
                                            <!-- <input type="text" class="form-control" placeholder="Website"> -->
                                            <textarea class="form-control" name="comment" id="comment" placeholder="Your comment"></textarea>
                                            <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit Comment</button>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- comments form  End -->
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
  
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">

                    <!-- start sidebar -->
                    <?php include_once 'includes/sidebar.php';?>
                    <!-- End sidebar -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- start footer -->
       <?php include_once 'includes/footer.php';?>
        <!-- End footer -->
 <div class="dmtop">Scroll to Top</div>
           </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

    <!-- <script type="text/javascript">
        
        $(document).ready(function(){
            
             function loadTable(){
                 $.ajax({
                     url: "show-comments.php",
                     type: "POST",
                    //  data: {post_id : id},
                     success: function(data){
                         $("#table-data").html(data);
                     }
                 });
             }
            loadTable();
            $("#submit").on("click",function(e){
                e.preventDefault();
                var name = $("#name").val();
                var email = $("#email").val();
                var comment = $("#comment").val();
                if(name == "" || email == "" || comment == ""){
                    $("#error-message").html("All Fields are requied.").slideDown();
                    $("#success-message").slideUp();
                }else{
                    $.ajax({
                     url: "insert-comments.php",
                     type: "POST",
                     data: {name:name, email: email, comment:comment},
                        // data: $("#addForm").serialize(),
                     success: function(data){
                        if(data == 1){
                            loadTable();
                            $("#addForm").trigger("reset");
                            $("#success-message").html("Record Save Successfully").slideDown();
                             $("#error-message").slideUp();
                        }else{
                            
                            $("#error-message").html("Can't save Record").slideDown();
                             $("#success-message").slideUp();
                        }
                        
                     }
                 });

                }
            

            });
            });
    </script> -->
</body>
</html>