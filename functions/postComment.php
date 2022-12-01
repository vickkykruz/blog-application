<?php

// Database Connection
require('../seen/database/db.php');

if(isset($_POST['PostComment'])){
    $name = $_POST['name'];
    $message = $_POST['message'];
    $blogId = $_POST['blogId'];
    $blogTitle = $_POST['blogTitle'];
    // echo $blogTitle;
    // exit;

    if(!empty($name && $message && $blogId)){

        $sql = "SELECT * FROM posts WHERE id='$blogId' AND title='$blogTitle'";
        $query = mysqli_query($connection, $sql);

        if(mysqli_num_rows($query) > 0){
            $insertComment = "INSERT INTO comments(name, comment, blogid) VALUES('$name', '$message', '$blogId')";
            $queryComment = mysqli_query($connection, $insertComment);

            if($queryComment){
                header("Location:../single.php?message=success&id=".$blogId."&title=".$blogTitle."");
            }else{
                header("Location:../single.php?message=failed&id=".$blogId."&title=".$blogTitle."");
            }
        }else{
            header("Location:../single.php?message=failed&id=".$blogId."&title=".$blogTitle."");
        }

    }else{
        header("Location:../index.php?error");
    }
}

if(isset($_POST['postReply'])){
    $replyName = $_POST['reply_name'];
    $replyMessage = $_POST['reply_message'];
    $commentId = $_POST['commentId'];
    $postId = $_POST['reply_blogId'];
    $postTitle = $_POST['reply_blogTitle'];
    // echo $postTitle;
    // exit;

    if(!empty($replyName && $replyMessage && $commentId && $postId && $postTitle)){

        $sql = mysqli_query($connection, "SELECT * FROM posts WHERE id='$postId' AND title='$postTitle'");

        if(mysqli_num_rows($sql) > 0){
            $insertReply = mysqli_query($connection, "INSERT INTO reply(name, comment, commentid) VALUES('$replyName', '$replyMessage', '$commentId')");

            if($insertReply){
                header("Location:../single.php?message=success&id=".$postId."&title=".$postTitle."");
            }else{
                header("Location:../single.php?message=failed&id=".$postId."&title=".$postTitle."");
            }
        }else{
            header("Location:../single.php?message=failed&id=".$postId."&title=".$postTitle."");
        }
    }else{
        header("Location:../index.php");
    }

}