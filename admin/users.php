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
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-12 col-md-12">

          <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  ALL USERS
                </header>

                <?php if (isset($_SESSION['FILE_UPLOADE_SUCCESS'])) { ?>
                  <div class="alert alert-success" style="color: #12351;"><?php echo $_SESSION['FILE_UPLOADE_SUCCESS']; ?></div>

                <?php unset($_SESSION['FILE_UPLOADE_SUCCESS']);
                } ?>
                <table class="table table-striped table-advance table-hover">
                  <tbody>
                    <tr>
                    <th><i class="icon_number"></i>S.No.</th>
                      <th><i class="icon_profile"></i> Full Name</th>
                 <!-- <th style="width: 400px;"><i class="icon_calendar"></i> Description</th> -->
                      <th><i class="icon_mail_alt"></i> Email</th>
                      <th><i class="icon_pin_alt"></i> Role</th>
                      
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
                    $sql = "SELECT * FROM admins ORDER BY admins.admin_id DESC LIMIT $offset, $limit";
                    $result = mysqli_query($con, $sql);
                    $serial_no = $offset + 1;
                    while ($row = mysqli_fetch_assoc($result)) { 
                        ?>
                      <tr>
                      <td class='id'><?php echo $serial_no ?></td>
                        <td><?php echo $row['admin_name']; ?></td>
                        <td><?php echo $row['admin_email']; ?></td>
                        <td><img src="assets/images/posts/<?php echo $row['admin_img']; ?>" width="50" alt="Admin image"></td>

                        <td><?php 
                                if($row['role'] == 1){
                                    echo "Admin";
                                }else{
                                    echo "Normal User";
                                }
                                ?>
                                </td>
                        <td>
                          <div class="btn-group">
                            <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                            <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                            <a class="btn btn-danger" href="delete_user.php?id=<?php echo $row['admin_id']; ?>"><i class="icon_close_alt2"></i></a>
                          </div>
                        </td>
                      </tr>
                      
                    <?php $serial_no++; } ?>
                  </tbody>
                </table>
              </section>
            </div>
          </div>
        </div>
      </div>
    
      <!-- Pagination Start -->
      <?php $sql1 = "SELECT * FROM admins";
            $result1 = mysqli_query($con, $sql1);
            if(mysqli_num_rows($result1)){ 
              $total_records = mysqli_num_rows($result1);
              $total_pages = ceil($total_records / $limit);
       echo '<ul class="pagination pagination-lg">';
              if($page > 1){
                echo '<li><a href="users.php?page='.($page - 1).'">«</a></li>';
              }
            for($i = 1; $i <= $total_pages; $i++){
              if($i == $page){
                $active = "active";
              }else{
                $active = "";
              }

          echo '<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
          }
        if($total_pages > $page){
          echo '<li><a href="users.php?page='.($page + 1).'">»</a></li>';
        }
   
       echo "</ul>";
            }
      ?>
               <!-- footer start -->
     <?php include_once 'includes_admin/admin_footer.php'; ?>
        <!-- footer end -->