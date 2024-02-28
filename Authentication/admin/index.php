<?php
session_start();
// Database Configuration File
include('includes/config.php');
// error_reporting(0); // Uncomment if you want to suppress errors

if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $password = md5($_POST['password']);
    $userType = $_POST['userType']; // Get selected user type

    if ($userType == 'admin') {
        // Query database to fetch admin data
        $sql = mysqli_query($con, "SELECT AdminUserName, AdminEmailId, AdminPassword, userType FROM tbladmin WHERE (AdminUserName='$uname' && AdminPassword='$password')");
        
        // Check for SQL errors
        if ($sql === false) {
            echo "Error: " . mysqli_error($con);
            exit;
        }

        // Check if rows are fetched
        if (mysqli_num_rows($sql) > 0) {
            $_SESSION['login'] = $_POST['username'];
            $_SESSION['utype'] = 'admin';
            echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
            exit;
        } else {
            // If no row is fetched, display error message
            echo "<script>alert('Invalid Admin Details');</script>";
        }
    } elseif ($userType == 'user') {
        // Query database to fetch user data
        $sql = mysqli_query($con, "SELECT Username, UserPassword, userType FROM tbluser WHERE (Username='$uname' && UserPassword='$password')");
        
        // Check for SQL errors
        if ($sql === false) {
            echo "Error: " . mysqli_error($con);
            exit;
        }

        // Check if rows are fetched
        if (mysqli_num_rows($sql) > 0) {
            $_SESSION['login'] = $_POST['username'];
            $_SESSION['utype'] = 'user';
            echo "<script type='text/javascript'> document.location = '../index.php'; </script>";
            exit;
        } else {
            // If no row is fetched, display error message
            echo "<script>alert('Invalid User Details');</script>";
        }
    } else {
        // Handle invalid user type
        echo "<script>alert('Invalid user type');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="News Portal.">
    <meta name="author" content="PHPGurukul">


    <!-- App title -->
    <title>News Portal | Admin Panel</title>

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <script src="assets/js/modernizr.min.js"></script>

</head>


<body class="bg-transparent">

    <!-- HOME -->
    <section>
        <div class="container-alt">
            <div class="row">
                <div class="col-sm-12">

                    <div class="wrapper-page">

                        <div class="m-t-40 account-pages">
                            <div class="text-center account-logo-box">
                                <h2 class="text-uppercase">
                                    <a href="index.html" class="text-success">
                                        <span><img src="assets/images/logo.png" alt="" height="56"></span>
                                    </a>
                                </h2>
                            </div>
                            <div class="account-content">
                                <form class="form-horizontal" method="post">

                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="text" required="" name="username"
                                                placeholder="Username or email" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="password" name="password" required=""
                                                placeholder="Password" autocomplete="off">
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <select class="form-control" name="userType" required="">
                                                <option value="user">User</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>

                                    <a href="forgot-password.php"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    <div class="clearfix"></div>
                                    <a href="registeruser.php"><i class="mdi mdi-account">Register as User?y</i> </a>
                                    <div class="clearfix"></div>
                                    <a href="../index.php"><i class="mdi mdi-home"></i> Back Home</a>

                                    <div class="form-group col-md-12 text-center">
                                        <button class="btn w-md btn-bordered btn-danger waves-effect waves-light"
                                            type="submit" name="login">Log In</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>


    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

</body>

</html>