<?php
session_start();
include'config.php';
$errors = [];
$user_id = "";
$passwordErr = $cpasswordErr = "";
$password = $cpassword = $terms = "";
// $token = $_SESSION['token'];
// ENTER A NEW PASSWORD
if (isset($_POST['new_password'])) {
    // $new_pass = mysqli_real_escape_string($link, $_POST['new_pass']);
    // $new_pass_c = mysqli_real_escape_string($link, $_POST['new_pass_c']);
    //validating errors
    if(empty($_POST["new_pass"])){
      $passwordErr = "Please enter a password.";     
      } else{
      $password = test_input($_POST["new_pass"]);
      if (strlen($_POST["new_pass"]) <= '8') {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
      }
      elseif(!preg_match("#[0-9]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
      }
      elseif(!preg_match("#[A-Z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
      }
      elseif(!preg_match("#[a-z]+#",$password)) {
          $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
      
      } 
    }
    // Validate confirm password
    if(empty($_POST['new_pass_c'])){
      $cpasswordErr = "Please confirm password.";     
    } else{
      $c_password = test_input($_POST['new_pass_c']);
      if(empty($passwordErr) && ($password != $c_password)){
          $cpasswordErr = "Password did not match.";
      }
    }
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

    // Grab to token that came from the email link
    $token = $_SESSION['token'];
    // if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
    // if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
    if (isset($_POST['new_password'])) {
      if( $passwordErr == "" && $cpasswordErr ==  "") {
        // select email address of user from the password_reset table 
        $sql = "SELECT email FROM password_reset WHERE token ='$token'";
        $results = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($results);
        $email = $row["email"];
        // $email = 'k@gmail.com';
    
        if ($email) {
          $new_pass = ($password);
          $sql = "UPDATE customers SET password='$new_pass' WHERE email='$email'";
          $result = mysqli_query($link, $sql);
          if ($result==TRUE) {
            # code...
            echo "<script>alert('Password has been successfully Reset');</script>";  
            echo "<script>window.location.href = 'auth-login-basic.php'</script>";
            //echo"Password has been successfully Reset";
            //header('location: auth-login-basic.php');
          }
          
        }
      }
    }
  


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Password Reset PHP</title>
  <link rel="stylesheet" href="main.css">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
</head>
</head>

<body>
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <img src="../assets/img/logo.png" alt="">
                </span>

              </a>
            </div>
            <!-- /Logo -->

            <form id="formAuthentication" class="mb-3" method="POST">
              <?php //include('messages.php'); ?>
              
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">New Password</label>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="new_pass"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  <span class="error">* <?php echo $passwordErr;?></span>
                </div>
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Confirm New Password</label>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="new_pass_c"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  <span class="error">* <?php echo $passwordErr;?></span>
                </div>
              </div>

              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" name="new_password">Reset</button>
              </div>
            </form>

            
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>
  

  <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>