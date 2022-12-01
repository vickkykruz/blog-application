<?php
  require('seen/database/db.php');

//   Carousel Sider
function make_query($connection){
    $obj = "SELECT * FROM posts WHERE action = 'publish' ORDER BY RAND()";
    $result = mysqli_query($connection, $obj);
    return $result;
}

function makei_query($connection){
    $obj = "SELECT comments.blogid, count(comments.id) as number_of_comments, posts.title, posts.image, posts.topic, posts.date, posts.id
    FROM comments LEFT OUTER JOIN posts ON comments.blogid = posts.id
    GROUP BY comments.blogid ORDER BY number_of_comments DESC";
    $result = mysqli_query($connection, $obj);
    return $result;
}


function make_slidesi($connection){
    $output = '';
    $count = 0;
    $max = 8;
    $result = makei_query($connection);
    while ($rows = mysqli_fetch_array($result) and ($count < $max) ){
        // if ($count == 0)
        // {
        //     $output .= '<div class="text-truncate"><a class="text-secondary" href="#" target="_blank" rel="noopener noreferrer">No Posts</a></div>';
        // }
        // else
        // {
        //     $output .= '<div class="text-truncate"><a class="text-secondary" href="single.php?id='.$rows["id"].''.$rows["topic"].''.$rows["title"].'" target="_blank" rel="noopener noreferrer">'.$rows["title"].'</a></div>';
        // }
        $output .= '<div class="text-truncate"><a class="text-secondary" href="single.php?id='.$rows["id"].''.$rows["topic"].'.php'.$rows["title"].'" target="_blank" rel="noopener noreferrer">'.$rows["title"].'</a></div>';
       
        $count = $count + 1;
    }
    return $output;
} 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NEWSROOM - Free Bootstrap Magazine Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="css/fonts.googleapis.css" rel="stylesheet">   

    <!-- Font Awesome -->
    <link href="css/fonts.awesome.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        /* #main_side{ */
            /* position: relative; */
        /* } */
        /* #sidebar {position: fixed; right: 0; top: 90px; } */
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light px-lg-5">
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-between">
                    <div class="bg-primary text-white text-center py-2" style="width: 100px;">Tranding</div>
                    <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 100px); padding-left: 90px;">
                        <?php echo make_slidesi($connection); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-right d-none d-md-block">
                <?= date('l, F jS, Y') ?>
                <!-- Monday, January 01, 2045 -->
            </div>
        </div>
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <img class="img-fluid" src="img/ads-700x70.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Topbar End -->


