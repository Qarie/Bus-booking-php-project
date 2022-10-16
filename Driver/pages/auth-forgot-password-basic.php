<?php
session_start();
include_once 'config.php';
$errors = [];
$user_id = "";
/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($link, $_POST['email']);
  // ensure that the user exists on our system
  $query = "SELECT email FROM customers WHERE email='$email'";
  $results = mysqli_query($link, $query);

  if (empty($email)) {
    array_push($errors, "Your email is required");
  }else if(mysqli_num_rows($results) <= 0) {
    array_push($errors, "Sorry, no user exists on our system with that email");
  }
  // generate a unique random token of length 100
  $token = bin2hex(random_bytes(50));
  $_SESSION['token'] = $token;
  if (count($errors) == 0) {
    // store token in the password-reset database table against the user's email
    $sql = "INSERT INTO password_reset(email, token) VALUES ('$email', '$token')";
    $results = mysqli_query($link, $sql);

    // Send email to user with the token in a link they can click on
    $to = $email;
    $subject = "Reset your password on examplesite.com";
    $msg = "Hi there, click on this <a href=\"http://localhost/bus/Customer/pages/new_pass.php?token=" . $token . "\">link</a> to reset your password on our site";
    $msg = wordwrap($msg,70);
    $headers = "From: info@examplesite.com";
    mail($to, $subject, $msg, $headers);
    header('location: pending.php?email=' . $email);
  }
}


?>

<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Forgot Password</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

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

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Forgot Password -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                  <img src="../assets/img/logo.png" alt="" >
                  </span>
                  
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Forgot Password?</h4>
              <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
              <form id="formAuthentication" class="mb-3" method="POST">
                <!-- form validation messages -->
		            <?php include('messages.php'); ?>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    autofocus
                  />
                </div>
                <button class="btn btn-primary d-grid w-100" name="submit">Send Reset Link</button>
              </form>
              <div class="text-center">
                <a href="auth-login-basic.php" class="d-flex align-items-center justify-content-center">
                  <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                  Back to login
                </a>
              </div>
            </div>
          </div>
          <!-- /Forgot Password -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    

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
