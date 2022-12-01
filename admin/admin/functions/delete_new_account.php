<?php

require_once "../../../database/pdo.php";

if(isset($_POST['delete_new_admin'])){

// Get The  ID
$newId = $_POST["id"];
// Get The Email
$newEmail = $_POST['user'];

$sql = "DELETE FROM admin WHERE id=? AND email=?";

$stmt = $db->prepare($sql);


try {
  $stmt->execute([$newId, $newEmail]);
//   exit;
  echo '<script>alert("Deleted Successfully");</script>';
  echo '<script>window.location.href="../index.php?deleted";</script>';
//   header('Location:../posts.php?deleted');

}

 catch (Exception $e) {
    $e->getMessage();
    // exit;
    echo '<script>alert("Error");</script>';
    echo '<script>window.location.href="../admin_details.php?id='.$newId.'&email='.$newEmail.'&message=del_error";</script>';
    // echo "Error";
}

}else {
echo '<script>window.location.href="../admin_details.php?id='.$newId.'&email='.$newEmail.'&message=del_error";</script>';
// header('Location:../posts.php?del_error');
}


