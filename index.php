<?php 
//   Carousel Sider
function make_ran($connection){
    $obj = "SELECT * FROM posts WHERE action = 'publish' ORDER BY RAND() LIMIT 10";
    $result = mysqli_query($connection, $obj);
    return $result;
}


    function make_slides($connection){
        $output = '';
        $count = 0;
        $max = 8;
        $result = make_query($connection);
        while ($rows = mysqli_fetch_array($result) and ($count < $max) ){
            $date = $rows['date'];
            if ($count == 0)
            {
                $output .= '<div class="position-relative overflow-hidden" style="height: 435px;">';
            }
            else
            {
                $output .= '<div class="position-relative overflow-hidden" style="height: 435px;">';
            }
            $output .= '
                    
                    <img class="img-fluid h-100" src="seen/functions/'.$rows['image'].'" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1">
                            <a class="text-white" href="'.$rows['topic'].'.php">'.ucfirst($rows['topic']).'</a>
                            <span class="px-2 text-white">/</span>
                            <a class="text-white" href="">'. date("F j, Y ", strtotime($date)) .'</a>
                        </div>
                        <a class="h2 m-0 text-white font-weight-bold" href="single.php?id='.$rows["id"].''.$rows["topic"].'.php'.$rows["title"].'" target="_blank" rel="noopener noreferrer">'.$rows["title"].'</a>
                    </div>
                </div>

               
            ';
            $count = $count + 1;
        }
        return $output;
    } 

    function make_header_new($connection){
        $output = '';
        $count = 0;
        $max = 8;
        $result = make_ran($connection);
        while ($rowi = mysqli_fetch_array($result) and ($count < $max) ){
            if ($count == 0)
            {
                $output .= '<div class="d-flex">';
            }
            else
            {
                $output .= '<div class="d-flex">';
            }
            $output .= '
                    
                    <img src="seen/functions/'.$rowi['image'].'" alt="'.$rowi['title'].'" style="width: 80px; height: 80px; object-fit: cover;">
                    <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                        <a class="text-secondary font-weight-semi-bold" href="single.php?id='.$rowi["id"].''.$rowi["topic"].'.php'.$rowi["title"].'" style="font-weight:600; font-size:13px;" target="_blank" rel="noopener noreferrer">'.$rowi["title"].'</a>
                    </div>
                </div>

               
            ';
            $count = $count + 1;
        }
        return $output;
    } 
    
  require('./partials/header.php') ?>
  <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="politics.php" class="nav-item nav-link">Politics</a>
                    <a href="entertainment.php" class="nav-item nav-link">Entertainment</a>
                    <a href="sport.php" class="nav-item nav-link">Sport</a>
                    <a href="business.php" class="nav-item nav-link">Business</a>
                    <a href="tech.php" class="nav-item nav-link">Tech</a>
                    <a href="food.php" class="nav-item nav-link">Food</a>
                    <a href="lifestyle.php" class="nav-item nav-link">Lifestyle</a>
                    <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
                </div>
                <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                    <input type="search" class="form-control" id="main_search"  placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="input-group-text text-secondary"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Top News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
                <?php echo make_header_new($connection); ?>
            </div>
        </div>
    </div>
    <!-- Top News Slider End -->


    <!-- Main News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                   
                </div>
               
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row" id="main_side">
                <div class="col-lg-8">
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                        <?php echo make_slides($connection); ?>
                    </div>

                    <div class="mb-3 mt-3 pb-3">
                        <a href=""><img class="img-fluid w-100" src="img/ads-700x70.jpg" alt=""></a>
                    </div>

                    <div id="pagination_data">
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                    <h3 class="m-0">HEADLINES</h3>
                                    <!-- <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a> -->
                                </div>
                            </div>

                            <div class="col-lg-12" >
                            
                                <div class="d-flex mb-3">
                                    <img src="img/news-100x100-1.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a href="">Technology</a>
                                            <span class="px-1">/</span>
                                            <span>January 01, 2045</span>
                                        </div>
                                        <a class="h6 m-0" href="">Loremi ipsum dolor sit amet consec adipis elit</a>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <img src="img/news-100x100-2.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a href="">Technology</a>
                                            <span class="px-1">/</span>
                                            <span>January 01, 2045</span>
                                        </div>
                                        <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="mb-3 pb-3">
                            <a href=""><img class="img-fluid w-100" src="img/ads-700x70.jpg" alt=""></a>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                    <h3 class="m-0">Popular</h3>
                                    <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                            
                                <div class="d-flex mb-3">
                                    <img src="img/news-100x100-5.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a href="">Technology</a>
                                            <span class="px-1">/</span>
                                            <span>January 01, 2045</span>
                                        </div>
                                        <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <img src="img/news-100x100-1.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a href="">Technology</a>
                                            <span class="px-1">/</span>
                                            <span>January 01, 2045</span>
                                        </div>
                                        <a class="h6 m-0" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <!-- Pag -->
                        <div class="row">
                            <div class="col-12">
                                <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    </li>
                                </ul>
                                </nav>
                            </div>
                        </div>

                    </div>
                    
                </div>
                
               <?php require('partials/aside.php') ?>

            </div>
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->

<?php require('partials/footer.php') ?>