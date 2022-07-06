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
            <h3 class="page-header"><i class="fa fa-files-o"></i> Add Category</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <li><i class="icon_document_alt"></i>Forms</li>
              <li><i class="fa fa-files-o"></i>Add Category</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Add Category
              </header>
              <?php
               
                if(isset($_POST['submit'])){
                  $category_name = $_POST['category'];

                  $sql1 = "SELECT category_name FROM categories WHERE category_name = '$category_name'";
                  $result = mysqli_query($con, $sql1);

                  if(mysqli_num_rows($result) >0){

                      echo '<p class="btn btn-warning">Category Already Exist</p>';
                  }else{

                    $sql = "INSERT INTO categories(category_name) VALUES('$category_name')";
                  if(mysqli_query($con, $sql)){
                    header('location:categories.php');
                //    echo '<script> window.location.href="categories.php"; </script>';
                  }else{
                    echo '<p class="btn btn-danger">Category Not Added</p>';
                  }

                }
                  }
                  
                ?>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Category <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="category" minlength="5" type="text" required />
                      </div>
                    </div>
                  
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="submit">Add Category</button>
                        
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