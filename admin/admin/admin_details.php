<?php 
 if (isset($_GET['id'])) {
    $inboxid = $_GET['id'];
    $sql="SELECT * FROM contacts WHERE id='$inboxid'";
}
else {
  echo '<script>alert("Unable To Read Admin Details")</script>';
  echo '<script>window.location.href="./inbox.php";</script>';
}
 
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
            <?php
                $sql_admin = "SELECT * FROM admin WHERE email='$email' AND profession = '$profession' AND status = 'Working'";
                $query_admin = mysqli_query($connection, $sql_admin);
                if(mysqli_num_rows($query_admin) == 0){
            ?>
            <div class="text-center">
                <h3 class="card-title text-danger">ACCESS DENIED</h3>
            </div>
            <?php
                }else{
                $sql_admin = "SELECT name, username, profession, email, status, dateOfBirth, res_date,
                                phoneNo, address, motherName, parentProf, jobDes, accNo, bankName,
                                accName, passport, qualification, card_id, signature, admin.id
                                FROM admin_details INNER JOIN admin ON admin_details.admin_Id = admin.id WHERE admin.id = '$inboxid'";
                $query_admin = mysqli_query($connection, $sql_admin);

                $rows = mysqli_num_rows($query_admin);

                if ($rows > 0){
                
                // $sql = "SELECT * FROM admin WHERE id = '$inboxid'";
                // $query = mysqli_query($connection, $sql);

                    while($row = mysqli_fetch_assoc($query_admin)){
                        $date = $row['dateOfBirth'];
                        $resDate = $row['res_date'];

                        if($row['status'] == "Not Working"){
                            $display = '<button class="btn btn-danger" data-toggle="modal" data-target="#responsive-modal-status'.$row["id"].'">Not Working</button>';
                        }else if($row['status'] == "Working"){
                            $display = '<button class="btn btn-success" data-toggle="modal" data-target="#responsive-modal-status'.$row["id"].'">Working</button>';
                        }else if($row['status'] == "Supended"){
                            $display = '<button class="btn btn-warning" data-toggle="modal" data-target="#responsive-modal-status'.$row["id"].'">Supended</button>';
                        }else{
                            $display = '<button class="btn btn-danger" c'.$row["id"].'">Error</button>';
                        }
            ?>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Admin Details</h4>
                            <p class="card-description">The Details of the Admin</p>
                            <div class="status text-right">
                                <h6 class="title">Status</h6>
                                <?= $display ?>
                            </div>
                            

                            <div class="row" style="padding-top:2.3rem;">
                                <div class="col-md-4">
                                    <h6 class="card-title text-center">Admin's Passport</h6>

                                    <div class="image-show text-center" style="padding-top:1.3rem;">
                                        <img class="w-100" src="../invite_admin/functions/<?= $row['passport'] ?>" width="100px" height="250px" alt="Admin's Passport">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <h6 class="card-title text-center" style="margin-top:20px">Basic Information</h6>

                                    <div class="form-show" style="padding:15px">

                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" style="color:#000; font-weight:600;" id="exampleInputUsername2" value="<?= ucfirst($row['name']) ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" style="color:#000; font-weight:600;" id="exampleInputUsername2" value="<?= ucfirst($row['email']) ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Date Of Birth</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" style="color:#000; font-weight:600;" id="exampleInputUsername2" value="<?=  date("F, j, Y ", strtotime($date)) ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Profession</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" style="color:#000; font-weight:600;" id="exampleInputUsername2" value="<?= ucfirst($row['profession']) ?>" disabled>
                                            </div>
                                        </div>

                                    </div>

                                    
                                    
                                </div>

                            </div>
                            
                            <h6 class="card-title" style="margin-top:20px;">Partnership Details</h6>
                            <hr style="background-color: #f5f5f5a6;">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Resumption Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="color:#000; font-weight:600;" id="exampleInputUsername2" value="<?=  date("F, j, Y ", strtotime($resDate)) ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Phone Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="color:#000; font-weight:600;" id="exampleInputUsername2" value="<?= ucfirst($row['phoneNo']) ?>" disabled>
                                </div>
                            </div>

                            <h6 class="card-title">K.Y.C Details</h6>
                            <hr style="background-color: #f5f5f5a6;">

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="color:#000; font-weight:600;" id="exampleInputUsername2" value="<?= ucfirst($row['address']) ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Mother's Maid Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="color:#000; font-weight:600;" id="exampleInputUsername2" value="<?= ucfirst($row['motherName']) ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Parent/Guidance Professtion</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="color:#000; font-weight:600;" id="exampleInputUsername2" value="<?= ucfirst($row['parentProf']) ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Job Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="color:#000; font-weight:600;" id="exampleInputUsername2" value="<?= ucfirst($row['jobDes']) ?>" disabled>
                                </div>
                            </div>

                            <h6 class="card-title">Account Details</h6>
                            <hr style="background-color: #f5f5f5a6;">

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Account Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="color:#000; font-weight:600;" id="exampleInputUsername2" value="<?= ucfirst($row['accNo']) ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Bank Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="color:#000; font-weight:600;" id="exampleInputUsername2" value="<?= ucfirst($row['bankName']) ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Account Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" style="color:#000; font-weight:600;" id="exampleInputUsername2" value="<?= ucfirst($row['accName']) ?>" disabled>
                                </div>
                            </div>

                            <h6 class="card-title">Means Of Identity</h6>
                            <hr style="background-color: #f5f5f5a6;">

                            <div class="row" style="padding-top:2.3rem;">
                                <div class="col-md-4">
                                    <h6 class="card-title text-center">Qualification</h6>

                                    <div class="image-show text-center" style="padding-top:1.3rem;">
                                        <img class="w-100" src="../invite_admin/functions/<?= $row['qualification'] ?>" width="100px" alt="Admin's Passport">
                                        <a href="../invite_admin/functions/<?= $row['qualification'] ?>" class="btn btn-outline-secondary btn-fw" style="margin-top:15px;" download><i class="mdi mdi-download"></i> Download</a>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <h6 class="card-title text-center">I.D</h6>

                                    <div class="image-show text-center" style="padding-top:1.3rem;">
                                        <img class="w-100" src="../invite_admin/functions/<?= $row['card_id'] ?>" width="100px" alt="Admin's Passport">
                                        <a href="../invite_admin/functions/<?= $row['card_id'] ?>" class="btn btn-outline-secondary btn-fw" style="margin-top:10px;" download><i class="mdi mdi-download"></i> Download</a>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <h6 class="card-title text-center">Signature</h6>

                                    <div class="image-show text-center" style="padding-top:1.3rem;">
                                        <img class="w-100" src="../invite_admin/functions/<?= $row['signature'] ?>" width="100px" alt="Admin's Passport">
                                        <a href="../invite_admin/functions/<?= $row['signature'] ?>" class="btn btn-outline-secondary btn-fw" style="margin-top:10px;" download><i class="mdi mdi-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>

                            <h6 class="card-title" style="margin-top:18px;">Action</h6>
                            <hr style="background-color: #f5f5f5a6;">

                                <div class="template-demo">
                                <button class="btn btn-danger" data-toggle="modal" data-target="#responsive-modal-delete<?= $row["id"] ?>">Detele Account</button>
                                <button class="btn btn-primary">Edit Account</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.status modal -->
                <div id="responsive-modal-status<?= $row["id"] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Edit Working Status</h4>
                            </div>
                            <form action="functions/edit_working_status.php" method="post">

                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputpwd1">Status</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                    <i class="icofont icofont-ui-user"></i>
                                            </div>
                                            <select name="status" class="form-control"> 
                                                    <option value="<?= $row['status'] ?>"><?= $row['status'] ?></option>
                                                    <option value="Working">Working</option>
                                                    <option value="Not Working">Not Working</option>
                                                    <option value="Supended">Supended</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                
                                    <input type="hidden" name="id" value="<?= $row["id"] ?>"/>
                                    <input type="hidden" name="user" value="<?= $row["email"] ?>">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" name="save" class="btn btn-success waves-effect waves-light">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete modal -->
                <div id="responsive-modal-delete<?= $row["id"] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Are you sure you to delete this account?</h4>
                            </div>
                            <form action="functions/delete_account.php" method="post">
                                <div class="modal-footer">
                                    <input type="hidden" name="id" value="<?= $row["id"] ?>"/>
                                    <input type="hidden" name="user" value="<?= $row["email"] ?>">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" name="delete" class="btn btn-danger waves-effect waves-light">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php } }else{ 
                    $sql = "SELECT * FROM admin WHERE id = '$inboxid'";
                    $query = mysqli_query($connection, $sql);

                    while($row_admin = mysqli_fetch_assoc($query)){
                ?>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Admin Details</h4>
                            <p class="card-description">The Details of the Admin</p>

                            <h6 class="card-title">Basic Info</h6>
                            <hr style="background-color: #f5f5f5a6;">

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" value="<?= ucfirst($row_admin['name']) ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" value="<?= ucfirst($row_admin['email']) ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" value="<?= ucfirst($row_admin['username']) ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Profession Assigned</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" value="<?= ucfirst($row_admin['profession']) ?>" disabled>
                                </div>
                            </div>

                            <h6 class="card-title">Action</h6>
                            <hr style="background-color: #f5f5f5a6;">

                            <div class="template">
                                <button class="btn btn-danger" data-toggle="modal" data-target="#responsive-modal-delete<?= $row_admin["id"] ?>">Detele Account</button>
                                <button class="btn btn-warning">Resend Link</button>
                            </div>

                        </div>      
                    </div>
                </div>

                <!-- Delete modal -->
                <div id="responsive-modal-delete<?= $row_admin["id"] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Are you sure you to delete this account?</h4>
                            </div>
                            <form action="functions/delete_new_account.php" method="post">
                                <div class="modal-footer">
                                    <input type="hidden" name="id" value="<?= $row_admin["id"] ?>"/>
                                    <input type="hidden" name="user" value="<?= $row_admin['email'] ?>">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" name="delete_new_admin" class="btn btn-danger waves-effect waves-light">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php } } }?>
            </div>
        </div>
          <!-- content-wrapper ends -->

        
          <!-- partial:partials/_footer.html -->
          <?php require_once('./partials/footer.php'); ?>