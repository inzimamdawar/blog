<?php  
        include_once 'includes/header.php';  
        include_once 'includes/config.php'; 
        session_start();

?>
<?php

    $cat_id = $_GET['cat_id'];
              
 ?>
    <div id="wrapper">
        <header class="tech-header header">
            <div class="container-fluid">
                <?php include_once 'includes/navbar.php'; ?> <!--header include -->
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->
<?php $result2 = mysqli_query($con, "SELECT * FROM posts INNER JOIN categories ON posts.category_id=categories.cat_id WHERE category_id='$cat_id' LIMIT 12"); 
 $row2 = mysqli_fetch_assoc($result2);
?>
        <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-gears bg-orange"></i> <?php echo $row2['category_name']; ?></h2>
                            </div><!-- end col -->
                             <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                            <li class="breadcrumb-item active"><?php echo $row2['category_name']; ?></li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">

                        <!--Left side bar start -->
                    <?php include('includes/leftsidebar.php'); ?>
                        <!--Left side bar end-->

                    </div><!-- end col -->
                    
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-grid-system">
                                <div class="row">
                                    
                                    <?php 
                                    
                                    if(isset($_GET['pageno'])){
                                        $page = (int) $_GET['pageno'];
                                    }else{
                                        $page=1;
                                    }
                                    $limit=5;
                                    $offset=($page-1)*$limit;
                                    
                                    $result = mysqli_query($con, "SELECT * FROM posts INNER JOIN categories ON posts.category_id=categories.cat_id INNER JOIN admins ON posts.author_id = admins.admin_id WHERE category_id='$cat_id'  LIMIT $offset, $limit");   
                                        if(mysqli_num_rows($result) == 0){
                                            echo '<script> window.location.href= "index.php" </script>';
                                                
                                     }else{   
                                        while ($row = mysqli_fetch_assoc($result)){
                                            
                                            ?>
                                    <div class="col-md-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="singlePost.php?id=<?php echo $row['post_id']; ?>" title="">
                                                    <img src="assets/images/posts/<?php echo $row['post_img']; ?>" alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta big-meta">
                                                <span class="color-orange"><a href="#" title=""><?php echo $row['category_name']; ?></a></span>
                                                <h4><a href="singlePost.php?id=<?php echo $row['post_id']; ?>" title=""><?php echo $row['post_title']; ?></a></h4>
                                                <p><?php echo substr($row['post_description'], 0, 200); ?></p>
                                                <small><a href="singlePost.php?id=<?php echo $row['post_id']; ?>" title=""><?php echo date('F jS, Y', strtotime($row['created_at'])); ?></a></small>
                                                <small><a href="admins.php?id=<?php echo $row['admin_id']; ?>" title=""><?php echo $row['admin_name']; ?></a></small>
                                                <small><a href="singlePost.php?id=<?php echo $row['post_id']; ?>" title=""><i class="fa fa-eye"></i><?php echo $row['post_views']; ?></a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                    <?php }

                                        } 
                                 ?>
                                   
                                </div><!-- end row -->
                            </div><!-- end blog-grid-system -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis3">

                        <div class="row">
                            <div class="col-md-12">
                                <?Php
                                $q= "SELECT * FROM posts where category_id='$cat_id'";
                                $run =mysqli_query($con,$q);
                               $total_posts=mysqli_num_rows($run);
                                $total_pages =ceil($total_posts/$limit);

                                ?>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <?php
                                        
                                        if($page>1){
                                            $previous = "";
                                        }else{
                                            $previous= "disabled";
                                        }
                                        

                                        // echo $page;
                                        // echo '<br>'.$total_pages;
                                        if($page<$total_pages){
                                            $next = "";
                                        }else{
                                            $next= "disabled";
                                        }
                                        ?>
                                    <li class="page-item <?=$previous?>">
                                            <a class="page-link" href="?cat_id=<?=$cat_id?>&pageno=<?=$page - 1?>">Prev</a>
                                        </li>
                                        <?php 
                                        for($i=1;$i<=$total_pages;$i++){  

                                            if($i==$page){
                                                $active="btn";
                                            }else{
                                                $active="";
    
                                            } 
                                         ?>
                                        

                                        <li class="page-item "><a class="page-link <?=$active?>" href="?cat_id=<?=$cat_id?>&pageno=<?=$i?>"><?=$i?></a></li>
                                       <?php } ?>

                                       
                                       
                                        <li class="page-item <?=$next?>">
                                            <a class="page-link" href="?cat_id=<?=$cat_id?>&pageno=<?=$page + 1?>">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <?php include_once('includes/footer.php'); ?>
    