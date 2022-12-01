<?php

ob_start();
require_once "./database/db.php";

// Initialize the session

session_start();

// If session variable is not set it will redirect to login page

if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

  header("location: login.php");
// header("location: posts.php");

  exit;
}

$email = $_SESSION['email'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SG Enterprices Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./template/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./template/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./template/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../images/favicon/sg falcon-1-size2.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <p class='text-center text-danger m-b-30'><span><i style='font-size:50px;' class='mdi mdi-close-circle'></i></span></p>
                <h4 class='text-center txt-success m-b-30'>ACCESS DENIED</h4>
                <p class='text-center' >Your account has been disabled.
                            To resolve this, <br>just reply to  <a href='mailto:'>support@sgenterprises</a>. <br> Click to  <a href='../index.php?respondes=invaildAccount'>Go home</a>
                </p>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./template/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./template/assets/js/off-canvas.js"></script>
    <script src="./template/assets/js/hoverable-collapse.js"></script>
    <script src="./template/assets/js/misc.js"></script>
    <script src="./template/assets/js/settings.js"></script>
    <script src="./template/assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>