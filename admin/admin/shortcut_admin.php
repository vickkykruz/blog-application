<?php 
require_once('./partials/header.php');
require_once('./partials/nav.php');
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper" style="padding-bottom: 10rem;">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="../template/assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Want even more features?</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">Check out our Pro version with 5 unique layouts!</p>
                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                          <a href="javascript:void(0)" class="btn btn-outline-light btn-rounded get-started-btn">Upgrade to PRO</a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-5" style="padding-bottom: 5rem;">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Administrators</h4>
                            <p class="card-description"> Total number of administrators<code>6</code>
                            </p>
                            <div class="text-right" style="padding-bottom:3.5rem;">
                                <button type="button" class="btn btn-warning btn-icon-text" data-toggle="modal" data-target="#responsive-modal">
                                    <i class="mdi mdi-plus btn-icon-prepend"></i> Add Admin 
                                </button>
                            </div>
                            <div class="table-responsive" id="pagination_data">
                               
                            </div>
                        </div>
                    </div>
                  </div>
              
            </div>
          </div>
          <!-- content-wrapper ends -->

          <!-- Modal -->
          <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Add Admin</h4>
                        </div>
                        <div class="modal-body">
                            <form action="./functions/add_admin.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputpwd1">Full Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="icofont icofont-ui-user"></i>
                                        </div>
                                        <input type="text" name="name" class="form-control" id="exampleInputpwd1" placeholder="Enter Admin's Name"  required=""> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputpwd1">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="icofont icofont-ui-user"></i>
                                        </div>
                                        <input type="text" name="username" class="form-control" id="exampleInputpwd1" placeholder="Enter Admin's Username"  required=""> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputpwd1">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="icofont icofont-ui-user"></i>
                                        </div>
                                        <input type="email" name="email" class="form-control" id="exampleInputpwd1" placeholder="Enter Admin's Email"  required=""> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputpwd1">Profession</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="icofont icofont-ui-user"></i>
                                            </div>
                                            <select name="profession" class="form-control"> 
                                                <option value="">None</option>
                                                <option value="Main Admin">Main Admin</option>
                                                <option value="TSD Property">TSD Property</option>
                                                <option value="SG Marketer">SG Marketer</option>
                                                <option value="Afflicate Marketing">Afflicate Marketing</option>
                                                <option value="Blog Writter">Blog Writter</option>
                                                <option value="Membership Manger">Membership Manger</option>
                                                <option value="Virual Assitance">Virual Assitance</option>
                                                <option value="SGMFB">SGMFB</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" name="save" class="btn btn-success waves-effect waves-light">Save</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
          <!-- partial:partials/_footer.html -->
          <?php require_once('./partials/footer.php'); ?>