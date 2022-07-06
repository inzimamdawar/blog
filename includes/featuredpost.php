  <?php require_once 'config.php';  ?>
  <section class="section first-section">
      <div class="container-fluid">

          <div class="masonry-blog clearfix">
              <!-- start banner post -->
              <?php
                $post_banner = 1;
                $result1 = mysqli_query($con, "SELECT * FROM posts INNER JOIN categories ON posts.category_id=categories.cat_id INNER JOIN admins ON posts.author_id=admins.admin_id WHERE post_banner='$post_banner'");

                if (mysqli_num_rows($result1) > 0) {

                    $row1 = mysqli_fetch_assoc($result1)

                ?>

                  <div class="first-slot">
                      <div class="masonry-box post-media">
                          <img src="assets/images/posts/<?php echo $row1['post_img']; ?>" alt="" id="banner-img" class="img-fluid">
                          <div class="shadoweffect">
                              <div class="shadow-desc">
                                  <div class="blog-meta">
                                      <span class="bg-orange"><a href="category.php?cat_id=<?php echo $row1['cat_id']; ?>" title=""><?php echo $row1['category_name']; ?></a></span>
                                      <h4><a href="singlePost.php?id=<?php echo $row1['post_id']; ?>" title=""><?php echo $row1['post_title']; ?></a></h4>
                                      <small><a href="singlePost.php?id=<?php echo $row1['post_id']; ?>" title=""><?php echo date('F jS, Y', strtotime($row1['created_at'])); ?></a></small>
                                      <small>BY Admin <a href="admins.php?id=<?php echo $row1['admin_id']; ?>" title=""><?php echo $row1['admin_name']; ?></a></small>
                                  </div><!-- end meta -->
                              </div><!-- end shadow-desc -->
                          </div><!-- end shadow -->
                      </div><!-- end post-media -->
                  </div><!-- end first-side -->

              <?php } ?>
                <!-- End banner post -->


               <!-- start featured post -->
              <?php
                $featured = 1;
                $result = mysqli_query($con, "SELECT * FROM posts INNER JOIN categories ON posts.category_id=categories.cat_id INNER JOIN admins ON posts.author_id=admins.admin_id WHERE post_featured='$featured' LIMIT 2");

                if (mysqli_num_rows($result) > 0):
                   while ($row = mysqli_fetch_assoc($result)):
                ?>
                      <div class="second-slot">
                          <div class="masonry-box post-media">
                              <img src="assets/images/posts/<?php echo $row['post_img']; ?>" alt="" id="banner-img" class="img-fluid">
                              <div class="shadoweffect">
                                  <div class="shadow-desc">
                                      <div class="blog-meta">
                                          <span class="bg-orange"><a href="category.php?cat_id=<?php echo $row['cat_id']; ?>" title=""><?php echo $row['category_name']; ?></a></span>
                                          <h4><a href="singlePost.php?id=<?php echo $row['post_id']; ?>" title=""><?php echo $row['post_title']; ?></a></h4>
                                          <small><a href="singlePost.php?id=<?php echo $row['post_id']; ?>" title=""><?php echo date('F jS, Y', strtotime($row['created_at'])); ?></a></small>
                                          <small>BY Admin <a href="admins.php?id=<?php echo $row['admin_id']; ?>" title=""><?php echo $row['admin_name']; ?></a></small>
                                      </div><!-- end meta -->
                                  </div><!-- end shadow-desc -->
                              </div><!-- end shadow -->
                          </div><!-- end post-media -->
                      </div><!-- end second-side -->
              <?PHP    endwhile;    endif;  ?>
            <!-- End featured post -->
          </div><!-- end masonry -->

      </div>
  </section>