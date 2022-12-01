<?php 
require_once('./partials/header.php');
require_once('./partials/nav.php');
 ?>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="./template/assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Want even more features?</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">Check out our Pro version with 5 unique layouts!</p>
                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                          <a href="javascript:void(0)" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Upgrade to PRO</a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
              $sql_admin = "SELECT profession, status
                         FROM admin_details INNER JOIN admin 
                         ON admin_details.admin_Id = admin.id
                          WHERE admin.email = '$email' AND admin.profession = '$profession'";
              $query_admin = mysqli_query($connection, $sql_admin);
              
              if (mysqli_num_rows($query_admin)==0) {
                  echo "<b style='color:brown;'>Sorry unable to fetch your data :( Please try again later! </b> ";
              }else{
                  while ($row= mysqli_fetch_array($query_admin) ) {
              ?>

            <div class="row">
              <?php
              if($row['profession'] == 'Main Admin'){  
                if($row['status'] == 'Working'){ 
              ?>

              <div class="col-xl-3 col-sm-6 grid-margin  stretch-card">
                <div class="card stretch-cards">
                  <a href="./blog/index.php?page=blogs&profession=<?= $profession ?>&email=<?= $email ?>">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0"><?php echo mysqli_num_rows($query);?></h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-nature-people icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal"> Blog</h6>
                    </div>
                  </a>
                  
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="./blog/index.php?page=blogs&profession=<?= $profession ?>&email=<?= $email ?>">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0"><?php echo mysqli_num_rows($query_comments);?></h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning">
                            <span class="mdi mdi-newspaper icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Comment</h6>
                    </div>
                  </a>
                </div>
              </div>
              
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="./inboxs/index.php?page=inboxs&profession=<?= $profession ?>&email=<?= $email ?>">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0"><?php echo mysqli_num_rows($query_contacts);?></h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-inbox-multiple icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Inboxs</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="./subscribers/index.php?page=subcribes&profession=<?= $profession ?>&email=<?= $email ?>">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0"><?php echo mysqli_num_rows($query_subscribes);?></h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>  
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-account-box-multiple icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Subscribes</h6>
                    </div>
                  </a>
                </div>
              </div>
             

              <?php }else if($row['status'] == 'Supended' || $row['status'] == 'Not Working'){ ?>

              <div class="col-xl-3 col-sm-6 grid-margin  stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-nature-people icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal"> Blog </h6>
                    </div>
                  </a>
                  
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning">
                            <span class="mdi mdi-newspaper icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Comments</h6>
                    </div>
                  </a>
                </div>
              </div>
              
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-inbox-multiple icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Inboxs</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>  
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-account-box-multiple icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Subscribes</h6>
                    </div>
                  </a>
                </div>
              </div>

              <?php } ?>

              <?php }else if($row['profession'] == 'Blog Writter'){
                    if($row['status'] == 'Working'){ ?>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="./blog/index.php?page=blogs&profession=<?= $profession ?>&email=<?= $email ?>">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0"><?php echo mysqli_num_rows($query_posts);?></h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning">
                            <span class="mdi mdi-newspaper icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Blog</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0 text-warning">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-home icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Comment</h6>
                    </div>
                  </a>
                </div>
              </div>
              
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-inbox-multiple icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Inboxs</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>  
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-account-box-multiple icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Subscribes</h6>
                    </div>
                  </a>
                </div>
              </div>
              

              <?php }else if($row['status'] == 'Supended' || $row['status'] == 'Not Working'){ ?>

              <div class="col-xl-3 col-sm-6 grid-margin  stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-nature-people icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal"> Blog</h6>
                    </div>
                  </a>
                  
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning">
                            <span class="mdi mdi-newspaper icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Comment</h6>
                    </div>
                  </a>
                </div>
              </div>
              
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-inbox-multiple icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Inboxs</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>  
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-account-box-multiple icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Subscribes</h6>
                    </div>
                  </a>
                </div>
              </div>
              <?php } ?>

              <?php }else if($row['profession'] == 'Membership Manger'){ 
                    if($row['status'] == 'Working'){ ?>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning">
                            <span class="mdi mdi-newspaper icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Blog</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0 text-warning">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-home icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Comments</h6>
                    </div>
                  </a>
                </div>
              </div>
              
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-inbox-multiple icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Inboxs</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="./subscribers/index.php?page=subcribes&profession=<?= $profession ?>&email=<?= $email ?>">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0"><?php echo mysqli_num_rows($query_subscribes);?></h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>  
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-account-box-multiple icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Subscribes</h6>
                    </div>
                  </a>
                </div>
              </div>
              

              
              <?php }else if($row['status'] == 'Supended' || $row['status'] == 'Not Working'){ ?>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning">
                            <span class="mdi mdi-newspaper icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Blog</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0 text-warning">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-home icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Comments</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-inbox-multiple icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Inboxs</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>  
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-account-box-multiple icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Subscribes</h6>
                    </div>
                  </a>
                </div>
              </div>
              

              <?php } ?>

              <?php }else if($row['profession'] == 'Virual Assitance'){ 
                    if($row['status'] == 'Working'){ ?>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning">
                            <span class="mdi mdi-newspaper icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Blog</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0 text-warning">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-home icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Comments</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="./inboxs/index.php?page=inboxs&profession=<?= $profession ?>&email=<?= $email ?>">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0"><?php echo mysqli_num_rows($query_contacts);?></h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-inbox-multiple icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Inboxs</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>  
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-account-box-multiple icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Subscribes</h6>
                    </div>
                  </a>
                </div>
              </div>
              

              
              <?php }else if($row['status'] == 'Supended' || $row['status'] == 'Not Working'){ ?>

              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning">
                            <span class="mdi mdi-newspaper icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Blog</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0 text-warning">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-home icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Comments</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-inbox-multiple icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Inboxs</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">NULL</h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>  
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-account-box-multiple icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">Subscribes</h6>
                    </div>
                  </a>
                </div>
              </div>

              <?php } ?>
            <?php } ?>
            </div>

            <div class="row">
              <div class="col-md-6 col-xl-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title">Inboxs</h4>
                      <!-- <p class="text-muted mb-1 small">View all</p> -->
                    </div>

                    <?php if($row['profession'] == 'Main Admin' || $row['profession'] == 'Virual Assitance'){ 
                        if($row['status'] == 'Working'){ ?>
                        <?php 
                          $sql_inbox = "SELECT * FROM contacts ORDER BY id DESC LIMIT 5";
                          $query_inbox = mysqli_query($connection, $sql_inbox);
                         
                        ?>
                    <div class="preview-list">
                      <?php 
                         while($row_inbox = mysqli_fetch_assoc($query_inbox)){
                          $inbox = $row_inbox['message'];

                          if(strlen($inbox) > 40){ 
                            $display = substr($inbox, 0, 40).'...';
                        }else{
                            $display = $inbox;
                        }
                      ?>
                      <div class="preview-item border-bottom">
                        
                        <div class="preview-item-content d-flex flex-grow">
                          
                          <div class="flex-grow">
                            <a href="inboxs/inbox_details.php?id=<?= $row_inbox['id'] ?>&name=<?= $row_inbox['names'] ?>&email=<?= $row_inbox['email'] ?>">
                              <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                <h6 class="preview-subject" style="color:#fff;"><?= ucfirst($row_inbox['names']) ?></h6>
                                <p class="text-muted text-small">5 minutes ago</p>
                              </div>
                              <p class="text-muted"><?= $display ?></p>
                            </a>

                          </div>
                            
                        </div>
                      </div>
                      <?php } ?>
                     
                      <div class="text-center mt-3">
                            <h6><a href="#">View All</a></h6>
                          </div>

                    </div>
                    <?php }else if($row['status'] == 'Supended' || $row['status'] == 'Not Working'){ ?>
                      <div class="preview-list">
                          <h5 class="card-title text-danger text-center">ACCESS DENIED</h5>
                      </div>
                      <?php } }else{ ?>
                        <div class="preview-list">
                          <h5 class="card-title text-danger text-center">ACCESS DENIED</h5>
                        </div>
                      <?php } ?>
                  </div>
                </div>
              </div>
              
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">Tranding Blogs</h4>
                      <!-- <p class="text-muted mb-1">Number Of View</p> -->
                    </div>
                    <?php if($row['profession'] == 'Main Admin' || $row['profession'] == 'Blog Writter'){ 
                        if($row['status'] == 'Working'){ ?>
                    <div class="row">
                      <div class="col-12">
                        <div class="preview-list">
                          <?php 
                            $sql = "SELECT comments.blogid, count(comments.id) as number_of_comments, posts.title, posts.image, posts.topic, posts.date, posts.visitor_counter ,posts.id
                            FROM comments LEFT OUTER JOIN posts ON comments.blogid = posts.id
                            GROUP BY comments.blogid ORDER BY number_of_comments DESC LIMIT 5";
                            $query = mysqli_query($connection, $sql);
                            while($rows = mysqli_fetch_assoc($query)){
                              $id  = $rows['id'];
                          ?>
                          <div class="preview-item border-bottom">
                            <a href="blog/all_blogs/blog-details.php?id=<?= $id ?>&title=<?= $rows['title'] ?>">
                              <div class="preview-item-content d-sm-flex flex-grow">
                                <div class="flex-grow">
                                  <h6 class="preview-subject" style="color:#fff;"><?= $rows['title'] ?></h6>
                                  <p class="text-muted mb-0"><?= ucfirst($rows['topic']) ?></p>
                                </div>
                                <!-- <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                  <p class="text-muted"><?= number_format($rows['visitor_counter']) ?></p>
                                </div> -->
                              </div>
                            </a>
                              
                          </div>
                          <?php } ?>
                          
                          <div class="text-center mt-3">
                            <h6><a href="#">View All</a></h6>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <?php }else if($row['status'] == 'Supended' || $row['status'] == 'Not Working'){ ?>
                          <h5 class="card-title text-danger text-center">ACCESS DENIED</h5>
                      <?php } }else{ ?>
                        <h5 class="card-title text-danger text-center">ACCESS DENIED</h5>
                      <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            
           
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Comments</h4>
                    <?php if($row['profession'] == 'Main Admin' || $row['profession'] == 'Blog Writter'){ 
                        if($row['status'] == 'Working'){ ?>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Name </th>
                            <th> Blog Title </th>
                            <th> Date </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $sql_comment = "SELECT * FROM comments ORDER BY id DESC LIMIT 5";
                            $query_comment = mysqli_query($connection, $sql_comment);
                            while($row_comment = mysqli_fetch_assoc($query_comment)){
                              $blogId = $row_comment['blogid'];
                              $date = $row_comment['date'];

                              $sql_post = "SELECT * FROM posts WHERE id = '$blogId'";
                              $query_post = mysqli_query($connection, $sql_post);
                              while($row_post = mysqli_fetch_assoc($query_post)){
                          ?>
                          <tr>
                            <td>
                              <?= $row_comment['name'] ?>
                            </td>
                            <td><?= $row_post['title'] ?> </td>
                            <td> <?= date("F j, Y ", strtotime($date)) ?> </td>
                          </tr>
                          <?php } } ?>
                          
                        </tbody>
                        <td ></td>
                      </table>
                      <h6 class="text-center"><a href="#">View All</a></h6>
                    </div>
                    <?php }else if($row['status'] == 'Supended' || $row['status'] == 'Not Working'){ ?>
                          <h5 class="card-title text-danger text-center">ACCESS DENIED</h5>
                      <?php } }else{ ?>
                        <h5 class="card-title text-danger text-center">ACCESS DENIED</h5>
                      <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <?php } } ?>
          </div>
          <!-- content-wrapper ends -->
         <?php require_once('./partials/footer.php') ?>