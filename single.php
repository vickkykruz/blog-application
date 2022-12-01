<?php   
    require('partials/header.php');
    if (isset($_GET['id'])) {
        $postid = $_GET['id'];

        $view = "UPDATE posts SET visitor_counter = visitor_counter+1 WHERE id='$postid'";
        $query_view = mysqli_query($connection, $view);
     
        $sql = "SELECT * FROM posts WHERE id='$postid'";
        $query = mysqli_query($connection, $sql);
     
        $sql2 = "SELECT * FROM comments WHERE blogid='$postid'";
        $query2 = mysqli_query($connection, $sql2);
        
        
      }
      else {
        header('Location:index.php');
      }


    
    ?>
    <?php
        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row["id"];
            $date = $row["date"];
            $cartigory = $row['topic'];

            if($cartigory == 'politics'){
                $display = '
                    <a href="politics.php" class="nav-item nav-link  active">Politics</a>
                    <a href="entertainment.php" class="nav-item nav-link">Entertainment</a>
                    <a href="sport.php" class="nav-item nav-link">Sport</a>
                    <a href="business.php" class="nav-item nav-link">Business</a>
                    <a href="tech.php" class="nav-item nav-link">Tech</a>
                    <a href="food.php" class="nav-item nav-link">Food</a>
                    <a href="lifestyle.php" class="nav-item nav-link">Lifestyle</a>
                ';
            }else if($cartigory == 'entertainment'){
                $display = '
                    <a href="politics.php" class="nav-item nav-link">Politics</a>
                    <a href="entertainment.php" class="nav-item nav-link active">Entertainment</a>
                    <a href="sport.php" class="nav-item nav-link">Sport</a>
                    <a href="business.php" class="nav-item nav-link">Business</a>
                    <a href="tech.php" class="nav-item nav-link">Tech</a>
                    <a href="food.php" class="nav-item nav-link">Food</a>
                    <a href="lifestyle.php" class="nav-item nav-link">Lifestyle</a>
                ';
            }else if($cartigory == 'sport'){
                $display = '
                    <a href="politics.php" class="nav-item nav-link">Politics</a>
                    <a href="entertainment.php" class="nav-item nav-link">Entertainment</a>
                    <a href="sport.php" class="nav-item nav-link active">Sport</a>
                    <a href="business.php" class="nav-item nav-link">Business</a>
                    <a href="tech.php" class="nav-item nav-link">Tech</a>
                    <a href="food.php" class="nav-item nav-link">Food</a>
                    <a href="lifestyle.php" class="nav-item nav-link">Lifestyle</a>
                ';
            }
     ?> 
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
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    
                    <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
                </div>
                <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                    <input type="text" class="form-control" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="input-group-text text-secondary"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

   
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="container">
            <nav class="breadcrumb bg-transparent m-0 p-0">
                <a class="breadcrumb-item" href="#">Home</a>
                <a class="breadcrumb-item" href="#"><?= ucfirst($row['topic']) ?></a>
                <span class="breadcrumb-item active"><?= ucfirst($row['title']) ?></span>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="seen/./functions/./<?= $row["image"] ?>" style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-3">
                                <a href="<?= $row['topic'] ?>"><?= ucfirst($row['topic']) ?></a>
                                <span class="px-1">/</span>
                                <span><?= date("F j, Y ", strtotime($date)) ?></span>
                            </div>
                            <div>
                               <?= $row['content'] ?>
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->
                    <div class="mb-3">
                        <a href=""><img class="img-fluid w-100" src="img/ads-700x70.jpg" alt=""></a>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">You Might Also This</h3>
                                <!-- <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a> -->
                            </div>
                        </div>
                    
                        <?php
                            $shuttle = "SELECT * FROM posts WHERE action = 'publish' ORDER BY RAND() LIMIT 5";
                            $query_shuttle = mysqli_query($connection, $shuttle);

                            while ($row_shuttle = mysqli_fetch_assoc($query_shuttle)) {
                                $shuttle_date = $row_shuttle['date'];
                        ?>  
                        <div class="col-lg-12">
                            <div class="d-flex mb-3">
                                <img src="seen/functions/<?= $row_shuttle['image'] ?>" style="width: 100px; height: 100px; object-fit: cover;">
                                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                    <div class="mb-1" style="font-size: 13px;">
                                        <a href="<?= $row_shuttle['topic'] ?>.php"><?= ucfirst($row_shuttle['topic']) ?></a>
                                        <span class="px-1">/</span>
                                        <span><?= date("F j, Y ", strtotime($shuttle_date)) ?></span>
                                    </div>
                                    <a class="h6 m-0" style="font-weight:700; font-size:15px;" href="single.php?id=<?= $row_shuttle["id"].''.$row_shuttle["topic"].'.php'.$row_shuttle["title"] ?>" target="_blank" rel="noopener noreferrer"><?= $row_shuttle['title'] ?></a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <?php
                        $numOfComments = mysqli_num_rows($query2);
                        if($numOfComments == 0){
                    ?>
                    
                    <?php }else{ ?>
                    <!-- Comment List Start -->
                    <div class="bg-light mb-3" style="padding: 30px;">
                        <h3 class="mb-4"><?= $numOfComments ?> Comments</h3>

                        <?php
                            // Function
                            function TimeAgo($oldTime, $newTime){
                                $timeCalc = strtotime($newTime) - strtotime($oldTime);
                                if($timeCalc >= (60 * 60 * 24 * 30 * 12 * 2)){
                                    $timeCalc = intval($timeCalc/60/60/24/30/12)." years ago";
                                }elseif ($timeCalc >= (60 * 60 * 24 * 30 * 12)) {
                                    $timeCalc = intval($timeCalc/60/60/24/30/12)." year ago";
                                }else if($timeCalc >= (60 * 60 * 24 * 30 * 2)){
                                    $timeCalc = intval($timeCalc/60/60/24/30)." months ago";
                                }else if($timeCalc >= (60 * 60 * 24 * 30)){
                                    $timeCalc = intval($timeCalc/60/60/24/30)." month ago";
                                }else if($timeCalc >= (60 * 60 * 24 * 2)){
                                    $timeCalc = intval($timeCalc/60/60/24)." days ago";
                                }else if($timeCalc >= (60 * 60 * 24)){
                                    $timeCalc = "Yesterday";
                                }else if($timeCalc >= (60 * 60 * 2)){
                                    $timeCalc = intval($timeCalc/60/60)." hours ago";
                                }else if($timeCalc >= (60 * 60)){
                                    $timeCalc = intval($timeCalc/60/60)." hour ago";
                                }else if($timeCalc >= (60 * 2)){
                                    $timeCalc = intval($timeCalc/60)." minutes ago";
                                }else if($timeCalc >= 60){
                                    $timeCalc = intval($timeCalc/60)." minute ago";
                                }else if($timeCalc > 0){
                                    $timeCalc .= " seconds ago";
                                }

                                return $timeCalc;
                            }

                            while($row_comment = mysqli_fetch_assoc($query2)){
                                $comment_date = $row_comment["date"];
                                $ids = $row_comment["id"];
                        ?>
                        <div class="media">
                            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6><span style="font-weight:600;"><?= ucfirst($row_comment["name"]) ?></span> <small><i><?= TimeAgo($comment_date, date("Y-m-d H:i:s")) ?></i></small></h6>
                                <p><?= $row_comment["comment"] ?></p>
                                <button class="btn btn-sm btn-outline-secondary mb-3" data-toggle="modal" data-target="#exampleModal<?= $ids?>">Reply</button>
                                <?php
                                    $sql4 = "SELECT reply.id, reply.date, reply.comment, reply.name, comments.blogid, reply.commentid, comments.id FROM comments INNER JOIN reply ON reply.commentid = comments.id WHERE comments.blogid='$postid' AND comments.id = '$ids'";
                                    $query4 = mysqli_query($connection, $sql4);

                                    $numOfReply = mysqli_num_rows($query4);

                                    if($numOfReply == 0 ){
                                ?>
                                 <?php }else{ 
                                    while($rows = mysqli_fetch_assoc($query4)){
                                        $reply_id = $rows['id'];
                                        $date = $rows['date'];
                                    ?>
                                <div class="media mt-4 mb-4">
                                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                        style="width: 45px;">
                                    <div class="media-body">
                                        <h6><span style="font-weight:600;"><?= ucfirst($rows["name"]) ?></span> <small><i><?= TimeAgo($date, date("Y-m-d H:i:s")) ?></i></small></h6>
                                        <p><?= ucfirst($rows['comment']) ?></p>
                                        <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#replyexampleModal<?= $reply_id?>">Reply</button>
                                    </div>
                                </div>

                                <!-- Reply Model -->
                                <div class="modal fade" id="replyexampleModal<?= $reply_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLabel">Relpy To <span style="font-weight:600;">@ <?= ucfirst($rows["name"]) ?></span></h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="functions/postComment.php" method="post">
                                                <input type="hidden" name="commentId" value="<?= $ids ?>">
                                                <input type="hidden" name="reply_blogId" value="<?= $id ?>">
                                                <input type="hidden" name="reply_blogTitle" value="<?= $row['title'] ?>">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="name">Name *</label>
                                                        <input type="text" name="reply_name" class="form-control" id="name" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="message">Message *</label>
                                                        <textarea id="message" name="reply_message" cols="10" rows="2" class="form-control"></textarea>
                                                    </div>                        
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="postReply"  class="btn btn-success">Post</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php } } ?>
                            </div>
                        </div> 
                        <!-- Reply Model -->
                        <div class="modal fade" id="exampleModal<?= $ids?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="exampleModalLabel">Relpy To <span style="font-weight:600;">@ <?= ucfirst($row_comment["name"]) ?></span></h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="functions/postComment.php" method="post">
                                        <input type="hidden" name="commentId" value="<?= $ids ?>">
                                        <input type="hidden" name="reply_blogId" value="<?= $id ?>">
                                        <input type="hidden" name="reply_blogTitle" value="<?= $row['title'] ?>">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Name *</label>
                                                <input type="text" name="reply_name" class="form-control" id="name" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="message">Message *</label>
                                                <textarea id="message" name="reply_message" cols="10" rows="2" class="form-control"></textarea>
                                            </div>                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="postReply"  class="btn btn-success">Post</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <?php } ?>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class="bg-light mb-3" style="padding: 30px;">
                        <h3 class="mb-4">Leave a comment</h3>
                        <?php 
                            if(isset($_GET['message'])){
                                $message = $_GET['message'];
                                if($message == 'success'){
                            ?>
                            <div class="alert alert-success">
                                <h6 class="text-center" style="font-weight:700;">Successful</h6>
                            </div>
                            <?php
                                }else if($message == 'failed'){
                            ?>
                            <div class="alert alert-warning">
                                <h6 class="text-center" style="font-weight:700;">Unable To Comment</h6>
                            </div>
                            <?php
                                }
                            } 
                        ?>
                        <form action="functions/postComment.php" method="post">
                            <input type="hidden" name="blogId" value="<?= $id ?>">
                            <input type="hidden" name="blogTitle" value="<?= $row['title'] ?>">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" name="name" class="form-control" id="name" require>
                            </div>

                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" name="message" cols="10" rows="2" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" name="PostComment"
                                    class="btn btn-primary font-weight-semi-bold py-2 px-3"> Post Comment </buttom>
                            </div>
                        </form>
                    </div>
                    <!-- Comment Form End -->
                </div>

                <?php require('partials/aside.php') ?>
            </div>
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->
    <?php } ?>


    <?php require('partials/footer.php') ?>