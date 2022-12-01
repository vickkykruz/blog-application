<?php

	ob_start();
	session_start();

	// DATABASE CONNECTION

    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','kruz');

    $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    if(!$connection){
        die("Could not connect to the database");
    }

	// Define variables and initialize with empty values

	$email = $password = $cadminId = $cadminEmail = $requestId = $requestEmail = "";

	$email_err = $password_err = $checkAdmin_err  = $request_err = "";



	// Processing form data when form is submitted

	if($_SERVER["REQUEST_METHOD"] == "POST"){



		// Check if email is empty

		if(empty(trim($_POST["email"]))){

			$email_err = 'Please enter an email address.';

		} else{

			$email = trim($_POST["email"]);

		}



		// Check if password is empty

		if(empty(trim($_POST['password']))){

			$password_err = 'Please enter your password.';

		} else{

			$password = trim($_POST['password']);

		}

		if(isset($_POST["check"])){
			$cadminId = trim($_POST["check"]);
		}else{
			$cadminId = '';
		}
		// echo $cadminId;
		// exit;

		if(isset($_POST["checkEmail"])){
			$cadminEmail = trim($_POST["checkEmail"]);
		}else{
			$cadminEmail = '';
		}

		if(isset($_POST["checkRequest"])){
			$requestId = trim($_POST["checkRequest"]);
		}else{
			$requestId = '';
		}

		if(isset($_POST["checkRequestEmail"])){
			$requestEmail = trim($_POST["checkRequestEmail"]);
		}else{
			$requestEmail = '';
		}
		// echo $cadminId;
		// exit;

		// Validate credentials

		if(empty($email_err) && empty($password_err)){

			// Prepare a select statement

			$sql = "SELECT email, password FROM admin WHERE email = ?";

		   
			if($stmt = mysqli_prepare($connection, $sql)){
				

				// Bind variables to the prepared statement as parameters

				mysqli_stmt_bind_param($stmt, "s", $param_email);

				// Set parameters

				$param_email = $email;

				// Attempt to execute the prepared statement

				if(mysqli_stmt_execute($stmt)){

					// Store result

					mysqli_stmt_store_result($stmt);

					// Check if email exists, if yes then verify password
					
	  
					if(mysqli_stmt_num_rows($stmt) == 1){

						// Bind result variables

						mysqli_stmt_bind_result($stmt, $email, $hashed_password);

						if(mysqli_stmt_fetch($stmt)){
							//
							//	echo '<pre>';
							// var_dump($hashed_password);
							// echo '</pre>';
							// exit;

							if(password_verify($password, $hashed_password)){
			
								/* Password is correct, so start a new session and
								save the email to the session */

								$sql_admin = "SELECT * FROM admin WHERE email='$email'";
								$query_admin = mysqli_query($connection, $sql_admin);

								while($row_admin = mysqli_fetch_assoc($query_admin)){
									$profession = $row_admin['profession'];
									$adminName = $row_admin['name'];
								}


								
								$_SESSION['profession'] = $profession;
								
								$_SESSION['email'] = $email;

								$sql_cadmin = "SELECT * FROM admin WHERE id='$cadminId' AND email='$cadminEmail'";
								$query_cadmin = mysqli_query($connection, $sql_cadmin);

								if(mysqli_num_rows($query_cadmin) > 0){
									echo '<script>alert("You Are Offically Welcome");</script>';
									echo '<script>window.location.href="./admin/admin_details.php?respond=youAreWelcome&name='.$adminName.'&email='.$email.'&profession='.$profession.'&id='.$cadminId.'&adminEmail='.$cadminEmail.'";</script>';
								}else{
								 echo '<script>alert("You Are Offically Welcome");</script>';
								 echo '<script>window.location.href="./index.php?respond=youAreWelcome&name='.$adminName.'&profession='.$profession.'&email='.$email.'";</script>';
									//   header("Location: index.php");
								}

								
								
							  // Close statement

							  //mysqli_stmt_close($statement);

							  //header("location: sales");

							} else{

								// Display an error message if password is not valid

								$password_err = 'The password you entered was not valid. Please try again.';
							  //   header("location: index.php");

							}

						}

					} else{

						// Display an error message if email doesn't exist

						$email_err = 'No account found with that email. Please recheck and try again.';

					}

				} else{

					echo '<script>alert("Oops! Something went wrong. Please try again later.");</script>';
          			echo '<script>window.location.href="./login.php?failed";</script>';
					// echo "Oops! Something went wrong. Please try again later.";

				}

			}



			// Close statement

			mysqli_stmt_close($stmt);

		}



		// Close connection

		mysqli_close($connection);

	}





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PoppenSeenBlog Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./template/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./template/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./template/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../images/favicon/sg falcon-1-size2.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <p style="color:red;">  <?php echo $email_err; ?> </p>
               	<p style="color:red;">  <?php echo $password_err; ?> </p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                  <div class="form-group">
                    <label>Email *</label>
                    <input  name="email" type="email" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input name="password" type="password" class="form-control p_input">
                  </div>

				  <?php
				  	if(isset($_GET['checkId'])){
				?>
					<input type="hidden" name="check" value="<?= $_GET['checkId'] ?>">
					<input type="hidden" name="checkEmail" value="<?= $_GET['checkEmail'] ?>">
				<?php
					  }
				  ?>
                  
				  <?php
				  	if(isset($_GET['checkUserId'])){
				?>
					<input type="hidden" name="checkRequest" value="<?= $_GET['checkUserId'] ?>">
					<input type="hidden" name="checkRequestEmail" value="<?= $_GET['checkUserEmail'] ?>">
				<?php
					  }
				  ?>
                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./template/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./template/assets/js/off-canvas.js"></script>
    <script src="./template/assets/js/hoverable-collapse.js"></script>
    <script src="./template/assets/js/misc.js"></script>
    <script src="./template/assets/js/settings.js"></script>
    <script src="./template/assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>