<!DOCTYPE html>
<?php 
include(__DIR__ .'/../components/config.php');
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?=BASEURL .'/vendor/fontawesome-free/css/all.min.css'?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=BASEURL .'/css/sb-admin-2.min.css'?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <?php 
                $query = mysqli_query($con, "select * from tblsite");
                while ($row = mysqli_fetch_array($query)) {
                    $logo = $row['siteLogo'];
                    $wtitle = $row['siteTitle'];
                }  
                ?>
                <p align="center">
                    <img src="<?= BASEURL .'/img/uploadeddata/'.$logo; ?>" width="150">
                </p>
                <h3 align="center" style="margin-top:4%;color:#fff"><?php echo $wtitle; ?></h3>
                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <form name="login" method="POST" action="<?= BASEURL . '/admin/login' ?>">
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block" style="background-image: url(<?=BASEURL .'/img/admin/5471.jpg'?>); background-position:center; background-size: cover;"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        </div>
                                        <form class="user">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required="true">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="inputpwd" id="inputpwd" placeholder="Password">
                                            </div>
                                            <input type="submit" name="login" class="btn btn-primary btn-user btn-block" value="login">
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="password-recovery.php" style="font-weight:bold">Forgot Password?</a>

                                        </div>

                                        <div class="text-center">
                                            <a class="small" href="<?=BASEURL?>" style="font-weight:bold;"><i class="fa fa-home" aria-hidden="true"></i> Home Page</a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="public/vendor/jquery/jquery.min.js"></script>
    <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=BASEURL.'/js/sb-admin-2.min.js'?>"></script>

</body>

</html>