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
                  <a href="./members/">
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
                      <h6 class="text-muted font-weight-normal"> Members</h6>
                    </div>
                  </a>
                  
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="./blog/">
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
                  <a href="./real_estate">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0 text-warning"><?php echo mysqli_num_rows($query_tsd);?></h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-home icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">TSD Property</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="./subscribers/">
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
                            <span class="mdi mdi-cart icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SG Market</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="./inboxs/">
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
                  <a href="./subscribers/">
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
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="./subscribers/">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0"><?php echo mysqli_num_rows($query_usersinovice);?></h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>  
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-bank icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SGMFB</h6>
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
                      <h6 class="text-muted font-weight-normal"> Members</h6>
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
                      <h6 class="text-muted font-weight-normal">TSD Property</h6>
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
                            <span class="mdi mdi-cart icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SG Market</h6>
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
                            <span class="mdi mdi-bank icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SGMFB</h6>
                    </div>
                  </a>
                </div>
              </div>

              <?php } ?>

              <?php }else if($row['profession'] == 'TSD Property'){ 
                    if($row['status'] == 'Working'){ ?>

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
                      <h6 class="text-muted font-weight-normal"> Members</h6>
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
                      <h6 class="text-muted font-weight-normal">Blog</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="./real_estate">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0 text-warning"><?php echo mysqli_num_rows($query_tsd);?></h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-home icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">TSD Property</h6>
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
                            <span class="mdi mdi-cart icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SG Market</h6>
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
                            <span class="mdi mdi-bank icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SGMFB</h6>
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
                      <h6 class="text-muted font-weight-normal"> Members</h6>
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
                      <h6 class="text-muted font-weight-normal">TSD Property</h6>
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
                            <span class="mdi mdi-cart icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SG Market</h6>
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
                            <span class="mdi mdi-bank icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SGMFB</h6>
                    </div>
                  </a>
                </div>
              </div>
              <?php } ?>

              <?php }else if($row['profession'] == 'SG Marketer'){ 
                      if($row['status'] == 'Working'){ ?>

              <div class="col-xl-3 col-sm-6 grid-margin  stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0);">
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
                      <h6 class="text-muted font-weight-normal"> Members</h6>
                    </div>
                  </a>
                  
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0);">
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
                  <a href="javascript:void(0);">
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
                      <h6 class="text-muted font-weight-normal">TSD Property</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0);">
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
                            <span class="mdi mdi-cart icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SG Market</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0);">
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
                  <a href="javascript:void(0);">
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
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0);">
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
                            <span class="mdi mdi-bank icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SGMFB</h6>
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
                      <h6 class="text-muted font-weight-normal"> Members</h6>
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
                      <h6 class="text-muted font-weight-normal">TSD Property</h6>
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
                            <span class="mdi mdi-cart icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SG Market</h6>
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
                            <span class="mdi mdi-bank icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SGMFB</h6>
                    </div>
                  </a>
                </div>
              </div>
              <?php } ?>

              <?php }else if($row['profession'] == 'Blog Writter'){
                    if($row['status'] == 'Working'){ ?>

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
                      <h6 class="text-muted font-weight-normal"> Members</h6>
                    </div>
                  </a>
                  
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="./blog/">
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
                      <h6 class="text-muted font-weight-normal">TSD Property</h6>
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
                            <span class="mdi mdi-cart icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SG Market</h6>
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
                            <span class="mdi mdi-bank icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SGMFB</h6>
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
                      <h6 class="text-muted font-weight-normal"> Members</h6>
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
                      <h6 class="text-muted font-weight-normal">TSD Property</h6>
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
                            <span class="mdi mdi-cart icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SG Market</h6>
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
                            <span class="mdi mdi-bank icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SGMFB</h6>
                    </div>
                  </a>
                </div>
              </div>
              <?php } ?>

              <?php }else if($row['profession'] == 'Membership Manger'){ 
                    if($row['status'] == 'Working'){ ?>

              <div class="col-xl-3 col-sm-6 grid-margin  stretch-card">
                <div class="card stretch-cards">
                  <a href="./members/">
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
                      <h6 class="text-muted font-weight-normal"> Members</h6>
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
                      <h6 class="text-muted font-weight-normal">TSD Property</h6>
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
                            <span class="mdi mdi-cart icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SG Market</h6>
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
                  <a href="./subscribers/">
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
                            <span class="mdi mdi-bank icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SGMFB</h6>
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
                      <h6 class="text-muted font-weight-normal"> Members</h6>
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
                      <h6 class="text-muted font-weight-normal">TSD Property</h6>
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
                            <span class="mdi mdi-cart icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SG Market</h6>
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
                            <span class="mdi mdi-bank icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SGMFB</h6>
                    </div>
                  </a>
                </div>
              </div>

              <?php } ?>

              <?php }else if($row['profession'] == 'Virual Assitance'){ 
                    if($row['status'] == 'Working'){ ?>

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
                      <h6 class="text-muted font-weight-normal"> Members</h6>
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
                      <h6 class="text-muted font-weight-normal">TSD Property</h6>
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
                            <span class="mdi mdi-cart icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SG Market</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="./inboxs/">
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
                  <a href="./subscribers/">
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
                            <span class="mdi mdi-bank icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SGMFB</h6>
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
                      <h6 class="text-muted font-weight-normal"> Members</h6>
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
                      <h6 class="text-muted font-weight-normal">TSD Property</h6>
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
                            <span class="mdi mdi-cart icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SG Market</h6>
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
                            <span class="mdi mdi-bank icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SGMFB</h6>
                    </div>
                  </a>
                </div>
              </div>

              <?php } ?>

              <?php } else if($row['profession'] == 'SGMFB'){ 
                 if($row['status'] == 'Working'){ ?>

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
                      <h6 class="text-muted font-weight-normal"> Members</h6>
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
                      <h6 class="text-muted font-weight-normal">TSD Property</h6>
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
                            <span class="mdi mdi-cart icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SG Market</h6>
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
              <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card stretch-cards">
                  <a href="javascript:void(0)">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-9">
                          <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0"><?php echo mysqli_num_rows($query_usersinovice);?></h3>
                            <!-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> -->
                          </div>  
                        </div>
                        <div class="col-3">
                          <div class="icon icon-box-warning ">
                            <span class="mdi mdi-bank icon-item"></span>
                          </div>
                        </div>
                      </div>
                      <h6 class="text-muted font-weight-normal">SGMFB</h6>
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
                        <h6 class="text-muted font-weight-normal"> Members</h6>
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
                        <h6 class="text-muted font-weight-normal">TSD Property</h6>
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
                              <span class="mdi mdi-cart icon-item"></span>
                            </div>
                          </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">SG Market</h6>
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
                              <span class="mdi mdi-bank icon-item"></span>
                            </div>
                          </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">SGMFB</h6>
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
                      <h4 class="card-title">Messages</h4>
                      <p class="text-muted mb-1 small">View all</p>
                    </div>

                    <div class="preview-list">
                      <?php if($row['profession'] == 'Main Admin' || $row['profession'] == 'Virual Assitance'){ 
                        if($row['status'] == 'Working'){ ?>
                      <div class="preview-item border-bottom">
                        <div class="preview-thumbnail">
                          <img src="./template/assets/images/faces/face6.jpg" alt="image" class="rounded-circle" />
                        </div>
                        <div class="preview-item-content d-flex flex-grow">
                          <div class="flex-grow">
                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                              <h6 class="preview-subject">Leonard</h6>
                              <p class="text-muted text-small">5 minutes ago</p>
                            </div>
                            <p class="text-muted">Well, it seems to be working now.</p>
                          </div>
                        </div>
                      </div>
                      <div class="preview-item border-bottom">
                        <div class="preview-thumbnail">
                          <img src="./template/assets/images/faces/face8.jpg" alt="image" class="rounded-circle" />
                        </div>
                        <div class="preview-item-content d-flex flex-grow">
                          <div class="flex-grow">
                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                              <h6 class="preview-subject">Luella Mills</h6>
                              <p class="text-muted text-small">10 Minutes Ago</p>
                            </div>
                            <p class="text-muted">Well, it seems to be working now.</p>
                          </div>
                        </div>
                      </div>
                      <div class="preview-item border-bottom">
                        <div class="preview-thumbnail">
                          <img src="./template/assets/images/faces/face9.jpg" alt="image" class="rounded-circle" />
                        </div>
                        <div class="preview-item-content d-flex flex-grow">
                          <div class="flex-grow">
                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                              <h6 class="preview-subject">Ethel Kelly</h6>
                              <p class="text-muted text-small">2 Hours Ago</p>
                            </div>
                            <p class="text-muted">Please review the tickets</p>
                          </div>
                        </div>
                      </div>
                      <div class="preview-item border-bottom">
                        <div class="preview-thumbnail">
                          <img src="./template/assets/images/faces/face11.jpg" alt="image" class="rounded-circle" />
                        </div>
                        <div class="preview-item-content d-flex flex-grow">
                          <div class="flex-grow">
                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                              <h6 class="preview-subject">Herman May</h6>
                              <p class="text-muted text-small">4 Hours Ago</p>
                            </div>
                            <p class="text-muted">Thanks a lot. It was easy to fix it .</p>
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
              <!-- <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Transaction History</h4>
                    <canvas id="transaction-history" class="transaction-chart"></canvas>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Transfer to Paypal</h6>
                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">$236</h6>
                      </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Tranfer to Stripe</h6>
                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">$593</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                      <h4 class="card-title mb-1">SG Market Catalogue</h4>
                      <p class="text-muted mb-1">Your data status</p>
                    </div>
                    <?php if($row['profession'] == 'Main Admin' || $row['profession'] == 'SG Marketer'){ 
                        if($row['status'] == 'Working'){ ?>
                    <div class="row">
                      <div class="col-12">
                        <div class="preview-list">
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-warning">
                                <i class="mdi mdi-cellphone-iphone"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">IPhones</h6>
                                <p class="text-muted mb-0">Upload Iphones for Sale.</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">15 minutes ago</p>
                                <p class="text-muted mb-0">30 tasks, 5 issues </p>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-warning">
                                <i class="mdi mdi-cellphone-android"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Android Phones</h6>
                                <p class="text-muted mb-0">Upload new design</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">1 hour ago</p>
                                <p class="text-muted mb-0">23 tasks, 5 issues </p>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-warning">
                                <i class="mdi mdi-headphones"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Head Phones</h6>
                                <p class="text-muted mb-0">New project discussion</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">35 minutes ago</p>
                                <p class="text-muted mb-0">15 tasks, 2 issues</p>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item border-bottom">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-danger">
                                <i class="mdi mdi-power-plug"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">Power Banks</h6>
                                <p class="text-muted mb-0">Sent release details to team</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">55 minutes ago</p>
                                <p class="text-muted mb-0">35 tasks, 7 issues </p>
                              </div>
                            </div>
                          </div>
                          <div class="preview-item">
                            <div class="preview-thumbnail">
                              <div class="preview-icon bg-warning">
                                <i class="mdi mdi-chart-pie"></i>
                              </div>
                            </div>
                            <div class="preview-item-content d-sm-flex flex-grow">
                              <div class="flex-grow">
                                <h6 class="preview-subject">UI Design</h6>
                                <p class="text-muted mb-0">New application planning</p>
                              </div>
                              <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                <p class="text-muted">50 minutes ago</p>
                                <p class="text-muted mb-0">27 tasks, 4 issues </p>
                              </div>
                            </div>
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
            
            <!-- <div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Revenue</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">$32123</h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                        </div>
                        <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Sales</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">$45850</h2>
                          <p class="text-success ml-2 mb-0 font-weight-medium">+8.3%</p>
                        </div>
                        <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Purchase</h5>
                    <div class="row">
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0">$2039</h2>
                          <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p>
                        </div>
                        <h6 class="text-muted font-weight-normal">2.27% Since last month</h6>
                      </div>
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
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
                            <th> Client Name </th>
                            <th> Email </th>
                            <th> Blog Post </th>
                            <th> Comment </th>
                            <th> Date </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <img src="./template/assets/images/faces/face1.jpg" alt="image" />
                              <span class="pl-2">Henry Klein</span>
                            </td>
                            <td>onwuegbuchulemvic02@gmail.com </td>
                            <td>First Blog </td>
                            <td>Wow I Love this Content alot </td>
                            <td> 04 Dec 2019 </td>
                          </tr>
                          <tr>
                            <td>
                              <img src="./template/assets/images/faces/face2.jpg" alt="image" />
                              <span class="pl-2">Estella Bryan</span>
                            </td>
                            <td>onwuegbuchulemvic02@gmail.com</td>
                            <td>Latest Power Bank In Time </td>
                            <td>Do You mean all this are the best?? </td>
                            <td> 04 Dec 2019 </td>
                          </tr>
                          
                        </tbody>
                      </table>
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