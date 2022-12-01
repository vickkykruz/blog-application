<?php

require_once "../../../database/pdo.php";

if (isset($_POST["delete"])) {

    // Get The  ID
    $id = $_POST["id"];
    // Get The Email
    $email = $_POST['user'];

    $sql = "DELETE admin, admin_details FROM admin LEFT OUTER JOIN admin_details ON admin.id = admin_details.admin_Id WHERE admin.id=? AND admin.emeil=?";
    $stmt = $db->prepare($sql);


    try {
      $stmt->execute([$id, $email]);
      exit;
      echo '<script>alert("Deleted Successfully");</script>';
      echo '<script>window.location.href="../index.php?deleted";</script>';
    //   header('Location:../posts.php?deleted');

    }

     catch (Exception $e) {
        $e->getMessage();
        exit;
        echo '<script>alert("Error");</script>';
        echo '<script>window.location.href="../admin_details.php?id='.$id.'&email='.$email.'&message=del_error";</script>';
        // echo "Error";
    }

}else {
    echo '<script>window.location.href="../admin_details.php?id='.$id.'&email='.$email.'&message=del_error";</script>';
    // header('Location:../posts.php?del_error');
}       


