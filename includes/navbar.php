 <?php require_once 'config.php'; ?>
 <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
     <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
     </button>
     <a class="navbar-brand" href="index.php"><img src="assets/images/posts/" alt="NEWS BLOG"></a>
     <div class="collapse navbar-collapse" id="navbarCollapse">
         <ul class="navbar-nav mr-auto">
             <li class="nav-item">
                 <a class="nav-link" href="index.php">Home</a>
             </li>
             <li class="nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                 <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                 <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                     <li>
                         <div class="container">
                             <div class="mega-menu-content clearfix">
                                 <div class="tab">


                                     <!-- category start -->
                                     <!--show nav categories -->
                                     <?php                                       
                                        $categorySql = mysqli_query($con, "SELECT * FROM categories WHERE post >0 ");

                                        while ($cat_row = mysqli_fetch_assoc($categorySql)) : ?>
                                         <button class="tablinks inactive"  onclick="openCategoryPosts('<?php echo $cat_row['cat_id']; ?>')"><?php echo $cat_row['category_name']; ?></button>
                                     <?php endwhile; ?>
                                            <!--show nav categories end-->
                                 </div>

                                    <div class="tab-details clearfix">
                                     <div id="1" class="tabcontent active">
                                         <div class="row" id="postsBycat">
 
                                         <!--show nav categories post start -->
                                             <?php
                                                $result = mysqli_query($con, "SELECT posts.*, categories.category_name FROM posts INNER JOIN categories ON posts.category_id=categories.cat_id 
                                                WHERE post_status = 1 AND post_banner = 0 AND post_featured = 0 
                                                ORDER BY post_id DESC LIMIT 4");

                                                while ($cat_posts = mysqli_fetch_assoc($result)) {

                                                ?>
                                                 <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12" id="hiderow">
                                                     <div class="blog-box">
                                                         <div class="post-media">
                                                             <a href="singlePost.php?id=<?php echo $cat_posts['post_id']; ?>" title="">
                                                                 <img src="assets/images/posts/<?php echo $cat_posts['post_img']; ?>" alt="" class="img-fluid">
                                                                 <div class="hovereffect">
                                                                 </div><!-- end hover -->
                                                                 <span class="menucat"><?php echo $cat_posts['category_name']; ?></span>
                                                             </a>
                                                         </div><!-- end media -->
                                                         <div class="blog-meta">
                                                             <h4><a href="singlePost.php?id=<?php echo $cat_posts['post_id']; ?>" title=""><?php echo $cat_posts['post_title']; ?></a></h4>
                                                         </div><!-- end meta -->
                                                     </div><!-- end blog-box -->
                                                 </div>
                                             <?php } ?>
                                         </div><!-- end row -->
                                         <!--show nav categories post end -->
                                     </div>
                                 </div><!-- end tab-details -->
                             </div><!-- end mega-menu-content -->
                         </div>
                     </li>
                 </ul>
             </li>

             <li class="nav-item">
                 <a class="nav-link" href="contact-us.php">Contact</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="contact-us.php">About</a>
             </li>
             <style>
                 .has-search .form-control {

                     padding-left: 2.375rem;
                 }

                 .has-search .form-control-feedback {
                     position: absolute;
                     z-index: 2;
                     display: block;
                     width: 2.375rem;
                     height: 2.375rem;
                     line-height: 2.111rem;
                     text-align: center;
                     pointer-events: none;
                     color: #aaa;
                 }
                 .float_right {
                    margin-left: 312px;
                 }
             </style>
             <!-- Actual search box -->
             <div class="main float_right">
                 <form method="POST" action="search.php">
                     <div class="form-group has-search d-flex">
                         <span class="fa fa-search form-control-feedback"></span>
                         <input type="text" class="form-control" name="search" placeholder="Search">
                     </div>
                 </form>
             </div>
         </ul>
         <ul class="navbar-nav mr-2">
             <li class="nav-item">
                 <a class="nav-link" href="#"><i class="fa fa-facebook"></i></a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#"><i class="fa fa-instagram"></i></a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#"><i class="fa fa-twitter"></i></a>
             </li>
         </ul>
     </div>
 </nav>