<?php
error_reporting(0);
//DB conncetion
include_once(__DIR__ .'/../components/config.php');
//validating Session
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> Manage Website</title>

        <!-- Custom fonts for this template-->
        <link href="<?= BASEURL . '/vendor/fontawesome-free/css/all.min.css' ?>" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">
        <style type="text/css">
            label {
                font-size: 16px;
                font-weight: bold;
                color: #000;
            }
        </style>

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

        <?php include_once(__DIR__ .'/../components/sidebar.php');?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php include_once(__DIR__ .'/../components/topbar.php');?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800">Manage Website</h1>
                        <form method="POST" enctype="multipart/form-data" action="<?=BASEURL .'/admin/update-site'?>">

                            <?php
                            $query = mysqli_query($con, "select * from tblsite");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>

                                <div class="row">

                                    <div class="col-lg-10">

                                        <!-- Basic Card Example -->
                                        <div class="card shadow mb-4">
                                            <input type="hidden" name="currentphoto" value="<?php echo $row['siteLogo']; ?>">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="inputSubject">Current Logo</label>
                                                    <img src="<?=BASEURL .'/img/uploadeddata/'. $row['siteLogo']; ?>" width="250">
                                                </div>


                                                <div class="form-group">
                                                    <label for="inputSubject">Website Title</label>
                                                    <input class="form-control" id="webtitle" name="webtitle" required="true" value="<?php echo $row['siteTitle']; ?>">
                                                </div>


                                                <div class="form-group">
                                                    <label for="inputSubject">Website Logo</label>
                                                    <input type="file" name="image" required class="form-control" />
                                                    <small style="color:red;">Only jpg / jpeg/ png /gif format allowed.</small>
                                                    </td>
                                                <?php } ?>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" id="submit" value="Update">
                                                </div>

                                                </div>

                                            </div>


                                        </div>



                                    </div>

                        </form>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <?php include_once(__DIR__ .'/../components/footer.php');?>

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->

<?php include_once(__DIR__ .'/../components/footer2.php');?>


        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

    </body>

    </html>
