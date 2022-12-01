<?php

// Connection
require_once('../seen/database/db.php');

$output = '';



if(isset($_POST['input'])){

    $input = $_POST['input'];

    $sql = "SELECT * FROM posts WHERE title LIKE '{$input}%' OR topic LIKE '{$input}%' OR date LIKE '{$input}%'";
    $query = mysqli_query($connection, $sql);

    $output .= '
    <div class="row mb-3">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">HEADLINES</h3>
                <!-- <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a> -->
            </div>
        </div>
        <div class="col-lg-12" >
    ';
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $date = $row['date'];

            $output .= '
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
            ';
        }
    }else{
        $output .= '
            <div class="d-flex mb-3">
                <h5 class="text-center text-danger">No Data Found :( No Data Found With Sort Character!. </h5>
            </div>
        ';
    }
    
    $output .= '
        </div>
    </div>
    
    <div class="mb-3 pb-3">
        <a href=""><img class="img-fluid w-100" src="img/ads-700x70.jpg" alt=""></a>
    </div>
    ';
echo $output;    
}


























