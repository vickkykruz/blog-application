<?php

ob_start();
require_once "../database/db.php";
// Initialize the session

session_start();

// If session variable is not set it will redirect to login page

if(!isset($_SESSION['email']) || empty($_SESSION['email'])){

  
  if(isset($_GET['checkId'])){
    $checkId = $_GET['checkId'];
    $checkEmail = $_GET['checkEmail'];
    $checkName = $_GET['checkName'];
    header("location: ../login.php?checkId=".$checkId."&checkEmail=".$checkEmail."&checkName=".$checkName."");
  }else{
    // $checkId = NULL;
    header("location: ../login.php");
  }
// header("location: posts.php");

  exit;
}

if(!isset($_SESSION['profession']) || empty($_SESSION['profession'])){

  header("location: ../restricted.account.php?invaildAccount&email=".$email."");
// header("location: posts.php");

  exit;
}

$profession = $_SESSION['profession'];


$email = $_SESSION['email'];

// echo $profession;
// exit;
$sql_admin = "SELECT * FROM admin WHERE email='$email' AND profession = '$profession'";
$query_admin = mysqli_query($connection, $sql_admin);

while($row = mysqli_fetch_assoc($query_admin)){
  $dataProfession = $row['profession'];
}

if($profession != $dataProfession ){
  header("Location:../restricted.account.php?invaildAccount&email=".$email."");
  exit;
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>S.G Enterprices Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../template/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../template/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../template/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../template/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../template/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../template/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../template/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../images/favicon/sg falcon-1-size2.png" />

    <style>
      .stretch-cards:hover{
         -webkit-box-shadow: 3px 4px 5px 4px rgba(27, 245, 7, 0.3);
         box-shadow: 3px 4px 5px 4px #daa520; 
         cursor: pointer;
       }
       
       table tbody td a {
         color: #525968;
       }

       table tbody td a:hover {
         color: #2c2e33;
       }
    </style>
  </head>
  <body>
    <div class="container-scroller">