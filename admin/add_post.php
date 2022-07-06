<?php include_once 'includes_admin/admin_header.php'; ?>


<!-- container section start -->
<section id="container" class="">
  <!--navebar start-->
  <?php include_once 'includes_admin/admin_navbar.php'; ?>
  <!--navebar end-->

  <!--sidebar start-->
  <?php include_once 'includes_admin/admin_sidebar.php'; ?>
  <!--sidebar end-->

  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">

            <!-- CKEditor -->
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Add Post
                </header>
                <div class="panel-body">
                  <!-- Quick start -->
                  <div class="col-lg-12 portlets">
                    <?php if (isset($_SESSION['FILE_UPLOAD_ERROR'])) {?>
                    <div class="alert alert-danger"><?php echo $_SESSION['FILE_UPLOAD_ERROR']; ?></div>

                     <?php unset($_SESSION['FILE_UPLOAD_ERROR']);
                    }
                     ?>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <div class="pull-left">Quick Post</div>
                        <div class="widget-icons pull-right">
                          <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                          <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="panel-body">
                        <div class="padd">

                          <div class="form quick-post">
                            <!-- Edit profile form (not working)-->

                            <form class="form-horizontal" action="add_post_Action.php" method="post" enctype="multipart/form-data">
                              <!-- Title -->
                              <div class="form-group">
                                <label class="control-label col-lg-2" for="title">Title</label>
                                <div class="col-lg-10">
                                  <input type="text" class="form-control" id="title" name="post_title">

                                </div>
                              </div>
                              <!-- Content -->
                              <div class="form-group">
                                <label class="control-label col-lg-2" for="content">Description</label>
                                <div class="col-lg-10">
                                  <!-- <textarea class="form-control ckeditor" name="post_description" rows="6"></textarea> -->

                                  <textarea class="form-control" id="content" name="post_description"></textarea>
                                </div>
                              </div>
                              <!-- Cateogry -->
                              <div class="form-group">
                                <label class="control-label col-lg-2">Category</label>
                                <div class="col-lg-10">
                                  <select class="form-control" name="category">
                                    <option value="">- Choose Cateogry -</option>

                                    <?php 
                                    $sql1 = "SELECT * FROM categories";
                                    $result = mysqli_query($con, $sql1);
                                    while ($row = mysqli_fetch_assoc($result)) 
                                    {?> 

                                    <option value="<?php echo $row['cat_id']; ?>"><?= $row['category_name'] ?></option>

                                    <?php } ?>
                                  </select>
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
                              <!-- Tags -->
                              <div class="form-group">
                                <label class="control-label col-lg-2" for="tags">Tags</label>
                                <div class="col-lg-10">
                                  <input name="tags" id="tagsinput" class="tagsinput" />

                                  <!-- <input type="text" class="form-control" id="tags"> -->
                                </div>
                              </div>

                              <!-- Buttons -->
                              <div class="form-group">
                                <!-- Buttons -->
                                <div class="col-lg-offset-2 col-lg-9">
                                  <button type="submit" class="btn btn-primary" name="submit">Add Now</button>
                                  <!-- <button type="submit" class="btn btn-danger" name="draft_post">Save Draft</button>
                                  <button type="reset" class="btn btn-default">Reset</button> -->
                                </div>
                              </div>
                            </form>
                          </div>


                        </div>
                        <!-- <div class="form">
                      <form action="#" class="form-horizontal">
                        <div class="form-group">
                          <label class="control-label col-sm-2">CKEditor</label>
                          <div class="col-sm-10">
                            <textarea class="form-control ckeditor" name="editor1" rows="6"></textarea>
                          </div>
                        </div>
                      </form>
                    </div> -->
                      </div>
              </section>
            </div>
          </div>
        </div>
      </div>
      <!-- page end-->
    </section>
  </section>
  <!--main content end-->
  <div class="text-right">
    <div class="credits">
      <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
</section>
<!-- container section end -->
<!-- javascripts -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

<!-- jquery ui -->
<script src="js/jquery-ui-1.9.2.custom.min.js"></script>

<!--custom checkbox & radio-->
<script type="text/javascript" src="js/ga.js"></script>
<!--custom switch-->
<script src="js/bootstrap-switch.js"></script>
<!--custom tagsinput-->
<script src="js/jquery.tagsinput.js"></script>

<!-- colorpicker -->

<!-- bootstrap-wysiwyg -->
<script src="js/jquery.hotkeys.js"></script>
<script src="js/bootstrap-wysiwyg.js"></script>
<script src="js/bootstrap-wysiwyg-custom.js"></script>
<script src="js/moment.js"></script>
<script src="js/bootstrap-colorpicker.js"></script>
<script src="js/daterangepicker.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<!-- ck editor -->
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<!-- custom form component script for this page-->
<script src="js/form-component.js"></script>
<!-- custome script for all page -->
<script src="js/scripts.js"></script>


</body>

</html>