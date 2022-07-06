<?php include_once 'includes/header.php'; ?> <?php session_start(); ?>

    <div id="wrapper">
        <header class="tech-header header">
            <div class="container-fluid">

                <?php include_once 'includes/navbar.php'; ?>

            </div><!-- end container-fluid -->
        </header><!-- end market-header -->

        <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-envelope-open-o bg-orange"></i> Contact us <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non. </small></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-wrapper">
                            <div class="row">
                                <div class="col-lg-5">
                                    <h4>Who we are</h4>
                                    <p>Tech Blog is a personal blog for handcrafted, cameramade photography content, fashion styles from independent creatives around the world.</p>
                   
                                    <h4>How we help?</h4>
                                    <p>Etiam vulputate urna id libero auctor maximus. Nulla dignissim ligula diam, in sollicitudin ligula congue quis turpis dui urna nibhs. </p>
             
                                    <h4>Pre-Sale Question</h4>
                                    <p>Fusce dapibus nunc quis quam tempor vestibulum sit amet consequat enim. Pellentesque blandit hendrerit placerat. Integertis non.</p>
                                </div>
                                <div class="col-lg-7">
                                        <?php
                                        if (isset($_SESSION['success'])) {
                                        echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
                                        unset($_SESSION['success']);
                                        }
                                        if (isset($_SESSION['error'])) {
                                            echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
                                            unset($_SESSION['error']);
                                            }
                                        ?>
                                    <form class="form-wrapper" action="contact-Action.php" method="POST">
                                        <input type="text" class="form-control" name="name" required  placeholder="Your name">
                                        <input type="email" class="form-control" name="email" required placeholder="Email address">
                                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                                        <input type="text" class="form-control" name="subject" required placeholder="Subject">
                                        <textarea class="form-control" name="message" required placeholder="Your message"></textarea>
                                        <button type="submit" name="submit" class="btn btn-primary">Send <i class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

 <?php include_once 'includes/footer.php';