<?php include_once 'includes/header.php'; ?>

    <div id="wrapper">
        <header class="tech-header header">
            <div class="container-fluid">

            <?php include_once 'includes/navbar.php'; ?>

            </div><!-- end container-fluid -->
        </header><!-- end market-header -->

        <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                <?php
                $admin_id = $_GET['id'];

                    $result1=mysqli_query($con, "SELECT * FROM admins WHERE admin_id='$admin_id'");
                    $admin=mysqli_fetch_assoc($result1);
                
                    ?>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-search bg-orange"></i> Admin by: <?php echo $admin['admin_name'];?></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="admins.php?id=<?php echo $admin['admin_id'];?>">Admin</a></li>
                            <li class="breadcrumb-item active"><?php echo $admin['admin_name'];?></li>
                        </ol>
                    </div><!-- end col -->              
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section">
            <div class="container">
                <div class="row">
                
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">About Admin</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="assets/images/posts/<?php echo $admin['admin_img']; ?>" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="admins.php?id=<?php echo $admin['admin_id']; ?>"><?php echo $admin['admin_name']; ?></a></h4>
                                        <p><?php echo $admin['admin_description']; ?><a href="#"><?php echo $admin['admin_website']; ?></a></p>

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
                            <div class="blog-list clearfix">
                            <?php 
                            if(isset($_GET['pageno'])) {

                                $page = (int) $_GET['pageno'];
                             
                             } else {  
                                  
                                 $page =1; 
                             }

                          $limit= 5;
                          $offset = ($page - 1)* $limit;
                            
                            $result= mysqli_query($con, "SELECT * FROM posts INNER JOIN admins ON posts.author_id=admins.admin_id WHERE admin_id='$admin_id' ORDER BY post_id DESC LIMIT $offset, $limit");
                            if(mysqli_num_rows($result) ==0){
                                echo '<script>window.location.href="index.php"</script>';
                            }else{
                                while ($row=mysqli_fetch_assoc($result)){
                                
                            
                            ?>
                                <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="singlePost.php?id=<?php echo $row['post_id']; ?>" title="">
                                                <img src="assets/images/posts/<?php echo $row['post_img']; ?>" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div><!-- end media -->
                                    </div><!-- end col -->

                                    <div class="blog-meta big-meta col-md-8">
                                        <h4><a href="singlePost.php?id=<?php echo $row['post_id']; ?>" title=""><?php echo $row['post_title']; ?></a></h4>
                                        <p class="text-truncate"><?php echo $row['post_description']; ?></p>
                                        <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title="">Reviews</a></small>
                                        <small><a href="singlePost.php?id=<?php echo $row['post_id']; ?>" title=""><?php echo date('F jS, Y',strtotime($row['created_at'])); ?></a></small>
                                        <small><a href="admins.php?id=<?php echo $row['admin_id']; ?>" title=""><?php echo $row['admin_name']; ?></a></small>
                                        <small><a href="singlePost.php?id=<?php echo $row['post_id']; ?>" title=""><i class="fa fa-eye"></i><?php echo $row['post_views']; ?></a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <?php } } ?>
                                <hr class="invis">

                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">

                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                   <!-- pagination start -->
                                   <?Php
                                $q= "SELECT * FROM posts WHERE author_id='$admin_id'";
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
                                            <a class="page-link" href="?id=<?=$admin_id?>&pageno=<?=$page - 1?>">Prev</a>
                                        </li>
                                        <?php 
                                        for($i=1;$i<=$total_pages;$i++){  

                                            if($i==$page){
                                                $active="btn";
                                            }else{
                                                $active="";
    
                                            } 
                                         ?>
                                        

                                        <li class="page-item "><a class="page-link <?=$active?>" href="?id=<?=$admin_id?>&pageno=<?=$i?>"><?=$i?></a></li>
                                       <?php } ?>

                                       
                                       
                                        <li class="page-item <?=$next?>">
                                            <a class="page-link" href="?id=<?=$admin_id?>&pageno=<?=$page + 1?>">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <h2 class="widget-title">Follow Us</h2>

                                <div class="row text-center">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="#" class="social-button facebook-button">
                                            <i class="fa fa-facebook"></i>
                                            <p>27k</p>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="#" class="social-button twitter-button">
                                            <i class="fa fa-twitter"></i>
                                            <p>98k</p>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="#" class="social-button google-button">
                                            <i class="fa fa-google-plus"></i>
                                            <p>17k</p>
                                        </a>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <a href="#" class="social-button youtube-button">
                                            <i class="fa fa-youtube"></i>
                                            <p>22k</p>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- end widget -->
                            
                                <?php include_once 'includes/sidebar.php'; ?>

                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

    <?php include_once 'includes/footer.php'; ?>