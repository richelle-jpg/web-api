<?php
session_start();
include('includes/config.php');

if (isset($_POST['submit'])) {

    $uname = $_POST['sadminusername'];
    $password = md5($_POST['pwd']); // Consider using more secure methods for password hashing
    $userType = 'user';

    // Use INSERT INTO statement to insert data into the table
    $sql = "INSERT INTO tbluser (Username, UserPassword, userType) VALUES ('$uname', '$password', '$userType')";

    // Execute the query
    if (mysqli_query($con, $sql)) {
        echo "<script type='text/javascript'> document.location = '../index.php '; </script>";
        exit;
    } else {
        // If insertion fails, display an error message
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
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
                                <form class="form-horizontal" name="addsuadmin" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputusername">Username (used for login)</label>
                                        <input type="text" placeholder="Enter user Username" name="sadminusername"
                                            id="sadminusername" class="form-control"
                                            pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$"
                                            title="Username must be alphanumeric 6 to 12 chars" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="pwd" name="pwd"
                                            placeholder="Enter password" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">&nbsp;</label>
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-custom waves-effect waves-light btn-md"
                                                id="submit" name="submit">Submit</button>
                                        </div>
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