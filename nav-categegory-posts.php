<?php 
    require_once 'includes/config.php';

if (isset($_POST['id'])) {
   $id = $_POST['id'];

   $result = mysqli_query($con, "SELECT * FROM posts INNER JOIN categories ON posts.category_id=categories.cat_id WHERE category_id='$id' ORDER BY posts.post_id DESC LIMIT 4");
    
   while ($cat_posts = mysqli_fetch_assoc($result)) {
        echo '<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                        <div class="blog-box">
                            <div class="post-media">
                                <a href="tech-single.html" title="">
                                <a href="tech-single.html" title="">
                                    <img src="assets/images/posts/'.$cat_posts['post_img'].'" alt="" class="img-fluid">
                                    <div class="hovereffect">
                                    </div><!-- end hover -->
                                    <span class="menucat">'.$cat_posts['category_name'].'</span>
                                </a>
                            </div><!-- end media -->
                            <div class="blog-meta">
                                <h4><a href="singlePost.php'.$cat_posts['post_id'].'" title="">'.$cat_posts['post_title'].'</a></h4>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->
                    </div>';
    }
}
// echo $_POST['id'];


 ?>