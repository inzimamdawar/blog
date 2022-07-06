 <?php  require_once 'includes/config.php'; ?>
 
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-top clearfix">
                                <h4 class="pull-left">Recent Posts <a href="#"><i class="fa fa-rss"></i></a></h4>
                            </div><!-- end blog-top -->

                            <div class="blog-list clearfix">
                                
                                <?php
                                          //$page = (int)  (isset($_GET['page'])) ? $_GET['page'] : 1;

                                  if(isset($_GET['page'])) {

                                       $page = (int) $_GET['page'];
                                    
                                    } else {  
                                         
                                        $page =1; 
                                    }

                                 $limit= 5;
                                 $offset = ($page - 1)* $limit;
                                 ?>
                                <?php
                                //  if(isset($_POST['submit'])){
                                //    $search=$_POST['search'];
                                //  $postquery = "SELECT * FROM posts INNER JOIN categories ON posts.category_id = categories.cat_id INNER JOIN authors ON posts.author_id = authors.id  WHERE post_title LIKE '%$search%' OR post_description LIKE '%$search%' AND post_status = 1  ORDER BY posts.post_id DESC LIMIT $offset, $limit";
                                //  }else{
                                    $postquery = "SELECT * FROM posts INNER JOIN categories ON posts.category_id = categories.cat_id INNER JOIN admins ON posts.author_id = admins.admin_id  WHERE post_status = 1 AND post_banner = 0 AND post_featured = 0  ORDER BY post_id DESC LIMIT $offset, $limit";
                                // }
                                 $result = mysqli_query($con, $postquery);
                                $strlengn = "Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,but also the leap into electronic typesetting,";
                                while($row = mysqli_fetch_assoc($result)){
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
                                            <h4><a href="singlePost.php?id=<?php echo $row['post_id'];?>" title=""><?php echo $row['post_title'];?></a></h4>
                                            <p class=""><?php echo substr($row['post_description'],0, 330
                                         );?></p>
                                            <small class="firstsmall"><a class="bg-orange" href="category.php?cat_id=<?php echo $row['cat_id']; ?>" title=""><?php echo $row['category_name'];?></a></small>
                                            <small><a href="singlePost.php?id=<?php echo $row['post_id'];?>" title=""><?php echo date('F jS, Y', strtotime($row['created_at'])); ?></a></small>
                                            <small>By  <a href="admins.php?id=<?php echo $row['admin_id']; ?>" title=""><?php echo $row['admin_name'];?></a></small>
                                            <small><a href="singlePost.php?id=<?php echo $row['post_id'];?>" title=""><i class="fa fa-eye"></i><?php echo $row['post_views'];?></a></small>
                                        </div><!-- end meta -->
                                   </div><!-- end blog-box -->

                                <hr class="invis">
                                <?php } ?>
                               

                                    <div class="row">
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="banner-spot clearfix">
                                                <div class="banner-img">
                                                    <img src="upload/banner_02.jpg" alt="" class="img-fluid">
                                                </div><!-- end banner-img -->
                                            </div><!-- end banner -->
                                        </div><!-- end col -->
                                    </div><!-- end row -->

                                    <hr class="invis">

                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">
                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">


                                    <!-- pagination start -->
                                    <?php 
                                    $sql1= "SELECT * FROM `posts` WHERE post_status = 1 AND post_banner = 0 AND post_featured = 0";
                                    $result1= mysqli_query($con, $sql1) or die("Query Unsuccessful");

                                     if(mysqli_num_rows($result1) > 0){
                                        $total_records= mysqli_num_rows($result1);
                                         
                                      $total_pages = ceil($total_records / $limit); ?>

                                 <ul class="pagination justify-content-start" >
                                 <li class="page-item">
                                           
                                           <?php $disabled = 'disabled'; if($page > 1){ $disabled = 'active'; }  ?>
                                               <a class="btn page-link <?php echo $disabled; ?>" href="?page=<?php echo $page - 1; ?>">Prev</a>
                                       
                                           </li>
                                        <?php  
                                       
                                        for ($i=1; $i <= $total_pages; $i++) { 
                                       
                                           $nonpage_active = 'non-active';
                                           $page_active = 'page-active';
                                       
                                             if($i == 1){ ?>
                                       
                                               <li class="page-item"><a class="page-link <?php if($page == 1) { echo $page_active; } else{ echo $nonpage_active; } ?>" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                           
                                           
                                           <?php }   if($i == 2)   {?>
                                                  
                                                <li class="page-item "><a class="page-link <?php if($page == 2) { echo $page_active; } else{ echo $nonpage_active; } ?>" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                           
                                            <?php } if($i == 3){ ?>
                                              
                                                <li class="page-item"><a class="page-link <?php if($page == 3) { echo $page_active; } else{ echo $nonpage_active; } ?>" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                           
                                            <?php }
                                       
                                              
                                            
                                       
                                        }
                                          if($page > 3){ ?>
                                              <?php if($page > 4){ echo '...'; } ?><li class="page-item"><a class="page-link <?php if($page > 3) { echo $page_active; } else{ echo $nonpage_active; } ?>" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
                                           
                                            <?php }
                                          
                                              ?>
                                          <li class="page-item">
                                              
                                           <?php $disabled = 'active'; if($page == $total_pages){ $disabled = 'disabled'; }  ?>
                                               <a class="btn page-link <?php echo $disabled; ?>" href="?page=<?php echo $page + 1; ?>">Next</a>
                                       
                                           </li>
                                       </ul>
                                     
                                           <!-- pagination end -->
                                          
                                           <?php } ?>
                                </nav>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        <!-- End Pagination -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <?php include_once('includes/sidebar.php'); ?>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>