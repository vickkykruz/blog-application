<?php
// Connection
require_once('../seen/database/db.php');

// echo "Hello";


$record_per_page = 30;
$page = '';
$output = '';

// Get the number of page
if (isset($_POST['page'])) {
    $page = $_POST['page'];
}else{
    $page = 1;
}


$start_from = ($page - 1) * $record_per_page;
$sql = "SELECT * FROM posts WHERE topic='entertainment' ORDER BY id DESC LIMIT $start_from, $record_per_page";
$query = mysqli_query($connection, $sql);

if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_array($query)){
        $date = $row['date'];
        $output .= '
        <div class="col-lg-12">
            <div class="d-flex mb-3">
                <img src="seen/blog/create_blog/functions/'.$row['image'].'" style="width: 100px; height: 100px; object-fit: cover;">
                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                    <div class="mb-1" style="font-size: 13px;">
                        <a href="'.$row['topic'].'.php">'.ucfirst($row['topic']).'</a>
                        <span class="px-1">/</span>
                        <span>'. date("F j, Y ", strtotime($date)) .'</span>
                    </div>
                    <a class="h6 m-0" style="font-weight:700; font-size:15px;" href="single.php?id='.$row["id"].''.$row["topic"].'.php'.$row["title"].'" target="_blank" rel="noopener noreferrer">'.$row['title'].'</a>
                </div>
            </div>
        </div>
        ';
    }
}else{
$output .= '
        <div class="col-lg-12">
            <h5 class="text-danger">No Posts In This Catigory :( Upload A Post Now !!!</h5>
        </div>
';
}

$output .= '
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav aria-label="Page navigation">
';
// Pagination
$page_query = "SELECT * FROM posts WHERE topic='entertainment' ORDER BY id ASC";
$page_result = mysqli_query($connection, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records/ $record_per_page);

$output .= '
            <ul class="pagination justify-content-center" >
';

if($page > 1){
    $previous = $page - 1;
    $output .= '<li class="page-item id="'.$previous.'">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>';
    $output .= ' <li class="page-item" id="1"><a class="page-link" href="#">1</a></li>>';
}

for($i=1; $i<=$total_pages; $i++){
    $active_class = "";
    if($i == $page){
        $active_class = "active";
    }
    $output .= '<li class="page-item '.$active_class.'" id="'.$i.'"><a class="page-link" href="#">'.$i.'</a><li>';
}

$output .= ' <li class="page-item"><a class="page-link" href="#">...</a></li>';

if($page < $total_pages){
    $page++;
    $output .= '<li class="page-item" id="'.$total_pages.'"><span class="page-link">'.$total_pages.'</span></li>';
    $output .= '<li class="page-item" id="'.$page.'">
                    <a class="page-link" href="#" aria-label="Next">
                        <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>';
    // $output .= '<li class="page-item" id="'.$page.'"><span class="page-link"><i class="icofont icofont-arrow-right"></i></span></li>';
}

$output .= '
            </ul>
        </nav>
    </div>
</div>
';

echo $output;