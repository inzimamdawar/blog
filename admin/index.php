     <?php include_once 'includes_admin/admin_header.php'; ?> 
  <!-- container section start -->
  <section id="container" class="">


    <?php include_once 'includes_admin/admin_navbar.php'; ?>

    <?php include_once 'includes_admin/admin_sidebar.php'; ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

      <div class="row">
        <div class="col-lg-12 col-md-12">

          <div class="row" >
            <div class="col-lg-12">
              <section class="panel">
                <div>
                    <header class="panel-heading">
                      ALL POST 
                      
                    </header>
                    <header class="panel-heading">
                    <a  style="position: relative;padding: 0 15px;" class="btn btn-primary"  href="add_post.php">Add Post</a>
                      
                    </header>
                </div>
                <div class="col-md-2">
                     
                </div>
                <?php if (isset($_SESSION['FILE_UPLOADE_SUCCESS'])) { ?>
                  <div class="alert alert-success" style="color: #12351;"><?php echo $_SESSION['FILE_UPLOADE_SUCCESS']; ?></div>

                <?php unset($_SESSION['FILE_UPLOADE_SUCCESS']);
                } ?>
                <table class="table table-striped table-advance table-hover">
                  <tbody>
                    <tr>
                      <th><i class="icon_profile"></i> Title</th>
                 <!-- <th style="width: 400px;"><i class="icon_calendar"></i> Description</th> -->
                      <th><i class="icon_mail_alt"></i> Category</th>
                      <th><i class="icon_pin_alt"></i> Author</th>
                      <th><i class="icon_mobile"></i> Publish Date</th>
                      <th><i class="icon_mobile"></i> Image</th>
                      <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    
                    <?php
                    $limit = 5;
                    if(isset($_GET['page'])){
                      $page = $_GET['page'];
                    }else{
                      $page = 1;
                    }
                    $offset = ($page - 1) * $limit;
                    $sql = "SELECT * FROM posts 
                            INNER JOIN categories ON posts.category_id=categories.cat_id 
                            INNER JOIN admins ON admins.admin_id=posts.author_id 
                            ORDER BY post_id DESC LIMIT $offset, $limit";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                      <tr>
                        <td><?php echo $row['post_title']; ?></td>
                     
                        <td><?php echo $row['category_name']; ?></td>
                        <td><?php echo $row['admin_name']; ?></td>
  
                        <td><?php echo date('F jS, Y', strtotime($row['created_at'])); ?></td>
                        <td><img src="../assets/images/posts/<?php echo $row['post_img']; ?>" width="50" alt="post image"></td>
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                            <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                            <a class="btn btn-danger" href="delete_post.php?id=<?php echo $row['post_id']; ?>"><i class="icon_close_alt2"></i></a>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </section>
            </div>
          </div>
        </div>
      </div>
    
      <!-- Pagination Start -->
      <?php $sql1 = "SELECT * FROM posts";
            $result1 = mysqli_query($con, $sql1);
            if(mysqli_num_rows($result1)){ 
              $total_records = mysqli_num_rows($result1);
              $total_pages = ceil($total_records / $limit);
       echo '<ul class="pagination pagination-lg">';
              if($page > 1){
                echo '<li><a href="index.php?page='.($page - 1).'">«</a></li>';
              }
            for($i = 1; $i <= $total_pages; $i++){
              if($i == $page){
                $active = "active";
              }else{
                $active = "";
              }

          echo '<li class="'.$active.'"><a href="index.php?page='.$i.'">'.$i.'</a></li>';
          }
        if($total_pages > $page){
          echo '<li><a href="index.php?page='.($page + 1).'">»</a></li>';
        }
   
       echo "</ul>";
            }
      ?>
               <!-- footer start -->
     <?php include_once 'includes_admin/admin_footer.php'; ?>
        <!-- footer end -->