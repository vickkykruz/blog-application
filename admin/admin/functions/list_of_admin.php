<?php
require_once "../../../database/db.php";

$record_per_page = 15;
$page = '';
$output = '';

if(isset($_POST["page"])){
    $page = $_POST["page"];
}else{
    $page = 1;
}

$start_from = ($page - 1) * $record_per_page;
$sql = "SELECT * FROM admin WHERE hidden='0' ORDER BY date DESC LIMIT $start_from, $record_per_page";
$query = mysqli_query($connection, $sql);
$counter = 1;
$output .= "
        <table class='table table-hover'>
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Status</th>
                </tr>
            </thead>
";

if(mysqli_num_rows($query) > 0){
       
    while($row = mysqli_fetch_array($query)){
        $id = $row['id'];

        $date = $row['date'];
        if($row['status'] == "Not Working"){
            $display = '<button disabled="disabled" class="btn btn-danger" >Not Working</button>';
        }else if($row['status'] == "Working"){
            $display = '<button  disabled="disabled"class="btn btn-success" >Working</button>';
        }else if($row['status'] == "Supended"){
            $display = '<button  disabled="disabled"class="btn btn-warning" >Supended</button>';
        }else{
            $display = '<button disabled="disabled" class="btn btn-danger" >Error</button>';
        }

        $sql_admin = "SELECT * FROM admin_details ";
        $query_admin = mysqli_query($connection, $sql_admin);

        // echo '<pre>';
        // var_dump($query_admin);
        // echo '</pre>';

        $row_details = mysqli_fetch_assoc($query_admin);

            $img = $row_details['passport'];

            if(empty($img)){
                $userpic = '<img class="img-xs rounded-circle " src="../invite_admin/functions/'.$row_details["passport"].'" alt="">';
            }else{
                $userpic = '<img class="img-xs rounded-circle " src="../template/assets/images/faces/face15.jpg" alt="">';
            }
        
        
        $output .= '
            <tbody>
                <tr>
                    <td><a href="./admin_details.php?id='.$row["id"].'&email='.$row["email"].'&name='.$row["name"].'">'. $counter .'</a></td>
                    <td>'.$userpic.'</td>
                    <td><a href="./admin_details.php?id='.$row["id"].'&email='.$row["email"].'&name='.$row["name"].'">'. ucfirst($row['name']).'</a></td>
                    <td><a href="./admin_details.php?id='.$row["id"].'&email='.$row["email"].'&name='.$row["name"].'">'.ucfirst($row['email']).'</a></td>
                    <td><a href="./admin_details.php?id='.$row["id"].'&email='.$row["email"].'&name='.$row["name"].'">'.ucfirst($row['username']).'</a></td>
                    <td>'.$display.'</td>
                </tr>

            </tbody>
        ';
    }
}else{
$output .= '
    <tbody>
        <tr><td class="text-danger"> No Admin Yet :( No Adminstractor!.</td></tr>
    </tbody>
';
}
$output .= '
</table>
<div align="center">
';

// Pagination
$page_query = "SELECT * FROM admin WHERE hidden='0' ORDER BY date DESC";
$page_result = mysqli_query($connection, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records/ $record_per_page);

$output .= '
<div class="paging mt-5 pb-5">
    <div class="template-demo">
        <div class="btn-group text-center role="group" aria-label="Basic example">
    ';

if($page > 1){
    $previous = $page - 1;
    $output .= '<li class="btn btn-outline-warning" id="1"><span class="page-link" > First Page</span></li>';
    $output .= '<li class="btn btn-outline-warning" id="'.$previous.'"><span class="page-link"><i class="icofont icofont-arrow-left"></i></span></li>';
}
for($i=1; $i<=$total_pages; $i++){
    $active_class = "";
    if($i == $page){
        $active_class = "active";
    }
    $output .= '<li class="btn btn-outline-warning'.$active_class.'" id="'.$i.'"><span class="page-link">'.$i.'</span><li>';
}

if($page < $total_pages){
    $page++;
    $output .= '<li class="btn btn-outline-warning"'.$page.'"><span class="page-link"><i class="icofont icofont-arrow-right"></i></span></li>';
    $output .= '<li class="btn btn-outline-warning"'.$total_pages.'"><span class="page-link">Last Page</span></li>';
}
$output .= '
</div>
</div>
</div>
    ';
echo $output;
?>
