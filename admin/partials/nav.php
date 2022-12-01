<?php
      $sql_admin = "SELECT username , profession, status, passport
                         FROM admin_details INNER JOIN admin 
                         ON admin_details.admin_Id = admin.id
                          WHERE admin.email = '$email' AND admin.profession = '$profession'";
      $query_admin = mysqli_query($connection, $sql_admin);

      // echo '<pre>';
      // var_dump($query_admin);
      // echo '</pre>';

      
      if (mysqli_num_rows($query_admin)==0) {
          echo "<b style='color:brown;'>Sorry unable to fetch your data :( Please try again later! </b> ";
      }else{
          while ($row= mysqli_fetch_array($query_admin) ) {
            $blogUrl = './blog/index.php?page=blog&getProgression='.$profession.'&email='.$email.'';
      ?>
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.php"><img src="../images/s.g_gold_logo_size.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.php"><img src="../images/favicon/sg falcon-1-size2.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="./invite_admin/functions/<?= $row['passport'] ?>" alt="">
                  <?php if($row['status'] == 'Working'){ ?>
                    <span class="count bg-success"></span>
                  <?php }else if($row['status'] == 'Supended'){ ?>
                    <span class="count bg-warning"></span>
                  <?php }else if($row['status'] == 'Not Working'){ ?>
                    <span class="count bg-danger"></span>
                  <?php }else{ ?>
                    <span class="count bg-danger"></span>
                   <?php } ?> 
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?= $row['username'] ?></h5>
                  
                  <span><?= $row['profession'] ?></span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="jaavascript:void(0)" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="./change_pass/" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="./index.php?page=dashboard&profession=<?= $profession ?>&email=<?= $email ?>">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php if($row['profession'] == 'Main Admin'){ 
                    if($row['status'] == 'Working'){ ?>
          
          
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false" aria-controls="blog">
              <span class="menu-icon">
                <i class="mdi mdi-newspaper"></i>
              </span>
              <span class="menu-title">Blogs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="blog">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="http://localhost/S.G%20Enterprices/SGAdmin/blog/create_blog/shortcut_createBlog.php?page=createablog&profession=<?= $profession ?>&email=<?= $email ?>" >Add Blog</a></li>
                <li class="nav-item"> <a class="nav-link" href="http://localhost/S.G%20Enterprices/SGAdmin/blog/shortcut_blog.php?page=blog&profession=<?= $profession ?>&email=<?= $email ?>">Blogs</a></li>
              </ul>
            </div>
          </li>
         
          <li class="nav-item menu-items">
            <a class="nav-link" href="http://localhost/S.G%20Enterprices/SGAdmin/inboxs/shortcut_inbox.php?page=inbox&profession=<?= $profession ?>&email=<?= $email ?>">
              <span class="menu-icon">
                <i class="mdi mdi-inbox-multiple"></i>
              </span>
              <span class="menu-title">Inboxs</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="http://localhost/S.G%20Enterprices/SGAdmin/subscribers/shortcut_sub.php?page=subscribes&profession=<?= $profession ?>&email=<?= $email ?>">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Subscribes</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="http://localhost/S.G%20Enterprices/SGAdmin/admin/shortcut_admin.php?page=subscribes&profession=<?= $profession ?>&email=<?= $email ?>">
              <span class="menu-icon">
                <i class="mdi mdi-developer-board"></i>
              </span>
              <span class="menu-title">Administrators</span>
            </a>
          </li>
          <?php }else if($row['status'] == 'Supended' || $row['status'] == 'Not Working'){ ?>
          >
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false" aria-controls="blog">
              <span class="menu-icon">
                <i class="mdi mdi-newspaper"></i>
              </span>
              <span class="menu-title">Blogs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="blog">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">Add Blog</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Blogs</a></li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-inbox-multiple"></i>
              </span>
              <span class="menu-title">Inboxs</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Subscribes</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-developer-board"></i>
              </span>
              <span class="menu-title">Administrators</span>
            </a>
          </li>

          <?php } ?>

          <?php }else if($row['profession'] == 'Blog Writter'){ 
                if($row['status'] == 'Working'){ ?>

          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false" aria-controls="blog">
              <span class="menu-icon">
                <i class="mdi mdi-newspaper"></i>
              </span>
              <span class="menu-title">Blogs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="blog">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="http://localhost/S.G%20Enterprices/SGAdmin/blog/create_blog/shortcut_createBlog.php?page=createablog&profession=<?= $profession ?>&email=<?= $email ?>" >Add Blog</a></li>
                <li class="nav-item"> <a class="nav-link" href="http://localhost/S.G%20Enterprices/SGAdmin/blog/shortcut_blog.php?page=blog&profession=<?= $profession ?>&email=<?= $email ?>">Blogs</a></li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-inbox-multiple"></i>
              </span>
              <span class="menu-title">Inboxs</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Subscribes</span>
            </a>
          </li>

          <?php }else if($row['status'] == 'Supended' || $row['status'] == 'Not Working'){ ?>
          
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false" aria-controls="blog">
              <span class="menu-icon">
                <i class="mdi mdi-newspaper"></i>
              </span>
              <span class="menu-title">Blogs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="blog">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">Add Blog</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Blogs</a></li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-inbox-multiple"></i>
              </span>
              <span class="menu-title">Inboxs</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Subscribes</span>
            </a>
          </li>

          <?php } ?>

          <?php }else if($row['profession'] == 'Membership Manger'){ 
                if($row['status'] == 'Working'){ ?>
          
          
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false" aria-controls="blog">
              <span class="menu-icon">
                <i class="mdi mdi-newspaper"></i>
              </span>
              <span class="menu-title">Blogs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="blog">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">Add Blog</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Blogs</a></li>
              </ul>
            </div>
          </li>
         
          <li class="nav-item menu-items">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-inbox-multiple"></i>
              </span>
              <span class="menu-title">Inboxs</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="http://localhost/S.G%20Enterprices/SGAdmin/subscribers/shortcut_sub.php?page=subscribes&profession=<?= $profession ?>&email=<?= $email ?>">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Subscribes</span>
            </a>
          </li>

          <?php }else if($row['status'] == 'Supended' || $row['status'] == 'Not Working'){ ?>
          
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false" aria-controls="blog">
              <span class="menu-icon">
                <i class="mdi mdi-newspaper"></i>
              </span>
              <span class="menu-title">Blogs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="blog">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">Add Blog</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Blogs</a></li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-inbox-multiple"></i>
              </span>
              <span class="menu-title">Inboxs</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Subscribes</span>
            </a>
          </li>

          <?php } ?>

          <?php }else if($row['profession'] == 'Virual Assitance'){ 
                 if($row['status'] == 'Working'){ ?>

          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false" aria-controls="blog">
              <span class="menu-icon">
                <i class="mdi mdi-newspaper"></i>
              </span>
              <span class="menu-title">Blogs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="blog">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">Add Blog</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Blogs</a></li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="http://localhost/S.G%20Enterprices/SGAdmin/inboxs/shortcut_inbox.php?page=inbox&profession=<?= $profession ?>&email=<?= $email ?>">
              <span class="menu-icon">
                <i class="mdi mdi-inbox-multiple"></i>
              </span>
              <span class="menu-title">Inboxs</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Subscribes</span>
            </a>
          </li>

          <?php }else if($row['status'] == 'Supended' || $row['status'] == 'Not Working'){ ?>
          
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="false" aria-controls="blog">
              <span class="menu-icon">
                <i class="mdi mdi-newspaper"></i>
              </span>
              <span class="menu-title">Blogs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="blog">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">Add Blog</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">Blogs</a></li>
              </ul>
            </div>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-inbox-multiple"></i>
              </span>
              <span class="menu-title">Inboxs</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Subscribes</span>
            </a>
          </li>

          <?php } ?>

          <?php }?>

          <li class="nav-item menu-items">
            <a class="nav-link" href="./functions/logout.php">
              <span class="menu-icon">
                <i class="mdi mdi-logout"></i>
              </span>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../images/favicon/sg falcon-1-size2.png" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <!-- <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li> -->
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <?php if($row['profession'] == 'Main Admin' || $row['profession'] == 'Virual Assitance'){ 
                    if($row['status'] == 'Working'){ ?>
                <li class="nav-item dropdown border-left">
                  <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-email"></i>
                    <span class="count bg-success"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                    <h6 class="p-3 mb-0">Messages</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <img src="./template/assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                        <p class="text-muted mb-0"> 1 Minutes ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <img src="./template/assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic">
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                        <p class="text-muted mb-0"> 15 Minutes ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <img src="./template/assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                        <p class="text-muted mb-0"> 18 Minutes ago </p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <p class="p-3 mb-0 text-center">4 new messages</p>
                  </div>
                </li>
                    <?php } if($row['status'] == 'Supended' || $row['status'] == 'Not Working'){ ?>
                      <li class="nav-item dropdown border-left">
                        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                          <i class="mdi mdi-email"></i>
                          <span class="count bg-success"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                          <h6 class="p-3 mb-0">Messages</h6>
                          <div class="dropdown-divider"></div>
                          <p class="text-danger text-center" style="padding-top:5px;">ACCESS DENIED</p>
                          <div class="dropdown-divider"></div>
                          <p class="p-3 mb-0 text-center">4 new messages</p>
                        </div>
                      </li>
                      <?php } ?>
              <?php } ?>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-calendar text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Event today</p>
                      <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                      <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-link-variant text-warning"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Launch Admin</p>
                      <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all notifications</p>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="./invite_admin/functions/<?= $row['passport'] ?>" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?= $row['username'] ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="./functions/logout.php" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Advanced settings</p>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
<?php } } ?>