<!-- header start -->
<?php include_once 'includes_admin/admin_header.php'; ?>
<!-- header end -->


  <!-- container section start -->
  <section id="container" class="">
  
     <!-- Navbar start -->
  <?php include_once 'includes_admin/admin_navbar.php'; ?>
  <!-- Navbar end -->
   

    <!--sidebar start-->
    <?php include_once 'includes_admin/admin_sidebar.php'; ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Form Validation</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-files-o"></i>Form Validation</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Form validations
              </header>
              <?php
               
              if(isset($_POST['submit'])){
                  
                  
                  $admin_name = htmlspecialchars(mysqli_real_escape_string($con,$_POST['fullname']));
                  $admin_email =htmlspecialchars(mysqli_real_escape_string($con, $_POST['email']));
                  $admin_password = md5($_POST['password']);
                  $role = htmlspecialchars(mysqli_real_escape_string($con,$_POST['role']));

                  $sql1 = "SELECT admin_email FROM admins WHERE admin_email = '$admin_email'";
                  $result = mysqli_query($con, $sql1);

                  if(mysqli_num_rows($result) >0){

                      echo '<p class="btn btn-warning">User Already Exist</p>';
              }else{

                // Upload Image
                $tmp_name = $_FILES['image']['tmp_name'];
                $name = $_FILES['image']['name'];

                // Check file size
                if ($_FILES["image"]["size"] > 15000000) {
                    $_SESSION['FILE_UPLOAD_ERROR'] = "Sorry, your file is too large.";
                    header("location: add_post.php");
                    exit;
                }

                // Check extension
                $target_file =  $name;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    $_SESSION['FILE_UPLOAD_ERROR'] = "Sorry, only JPG, JPEG, PNG files are allowed.";
                    header("location:users.php");
                    exit;
                }

                // Upload file path
                $file_path = "../assets/images/posts/";


                $newImageName = time() . '.' . $imageFileType;
                //    echo $newImageName;
                if (move_uploaded_file($tmp_name, $file_path . $newImageName)) {
            

                    $sql = "INSERT INTO admins(admin_name, admin_email, admin_password,admin_img role) 
                            VALUES('$admin_name', '$admin_email', '$admin_password','$newImageName','$role')";
                  if(mysqli_query($con, $sql)){
                   echo '<script> window.location.href="users.php"; </script>';
                  }else{
                    echo '<p class="btn btn-danger">User Not Added</p>';
                  }

                }
                  }
                }
                ?>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Full Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="fullname" minlength="5" type="text" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-2">E-Mail <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="cemail" type="email" name="email" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cpassword" class="control-label col-lg-2">Password<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="cpassword" type="password" name="password" required />
                      </div>
                    </div>
                     <!-- File upload -->
                     <div class="form-group">
                                <label class="control-label col-lg-2" for="exampleInputFile">File input</label>
                                <div class="col-lg-10">
                                  <input type="file" id="exampleInputFile" name="image">
                                </div>
                                <p class="help-block">Example block-level help text here.</p>
                              </div>
                              <!-- File upload end -->
                    <div class="form-group">
                          <label class="control-label col-lg-2">User Role<span class="required">*</span></label>
                          <select class="col-lg-10" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="submit">Add User</button>
                        
                      </div>
                    </div>
                  </form>
                </div>
               
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    
     <!-- footer start -->
     <?php include_once 'includes_admin/admin_footer.php'; ?>
        <!-- footer end -->