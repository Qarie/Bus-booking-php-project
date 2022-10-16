<?php
// Include config file
require_once "config.php";

//form validations
   // define variables and set to empty values
   $nameErr = $usernameErr = $dobErr = $sexErr = $phoneErr = $emailErr = $passwordErr = $cpasswordErr = $termsErr = "";
   $name = $username = $dob = $sex = $phone = $email = $password = $cpassword = $terms = "";
   
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }

      if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
      } else {
        $username = test_input($_POST["username"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
          $usernameErr = "Only letters and white space allowed";
        }
      }
      if (empty($_POST["dob"])) {
        $dobErr = "Date of Birth is required";
      } else {
        $dob = test_input($_POST["dob"]);
    
      }    
      if (empty($_POST["sex"])) {
        $sexErr = "Gender is required";
      } else {
        $sex = test_input($_POST["sex"]);
    
      }
      
      if (empty($_POST["phone"])) {
        $phoneErr = "phone is required";
      } else {
        $phone = test_input($_POST["phone"]);
        // check if phone number is well-formed
        if (!preg_match("/^[0-9]{11}+$/",$phone)) {
          $phoneErr = "Invalid phone number";

        }
        
      }
      if (empty($_POST["email"])) {
        $emailErr = "email is required";
      } else {
        $email = test_input($_POST["email"]);
        // check if email number is well-formed
        /*if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
          $emailErr = "Invalid email format";  
        } */
        if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email)) {
          $emailErr = "Invalid email format";
        }
      }
      // Validate password
      if(empty($_POST["password"])){
        $passwordErr = "Please enter a password.";     
        } else{
        $password = test_input($_POST["password"]);
        if (strlen($_POST["password"]) <= '8') {
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
      if(empty($_POST["c_password"])){
        $cpasswordErr = "Please confirm password.";     
      } else{
        $c_password = test_input($_POST["c_password"]);
        if(empty($passwordErr) && ($password != $c_password)){
            $cpasswordErr = "Password did not match.";
        }
      }
      if (empty($_POST["terms"])) {
        $termsErr = "checkbox is required";
      } else {
        $terms = test_input($_POST["terms"]);
    
      }
    }
   
   function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }

   if(isset($_POST['submit'])) {  
    if($nameErr == "" && $usernameErr == "" && $dobErr == "" && $sexErr == "" && $phoneErr == "" && $emailErr == "" && $passwordErr == "" && $cpasswordErr == "" && $termsErr == "") {
      $sql="INSERT INTO customers (name,username,dob,gender,phone,email,password) Values('$name','$username','$dob','$sex','$phone','$email','$password')";
      $sql_query=mysqli_query($link,$sql);
      if($sql_query==TRUE){
        header("Location: auth-register-basic.php?success=Your account has been created successfully");
	      exit();
      }else{
        header("Location: auth-register-basic.php?error=unknown error occurred");
		    exit();
      }
      

     }
    }
   
  
//insert to the db
/*if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $username=$_POST['username'];
  $dob=$_POST['dob'];
  $Gender=$_POST['sex'];
  $phone=$_POST['phone'];
  $Email=$_POST['email'];
  $password=$_POST['password'];

  $sql="INSERT INTO customers (name,username,dob,gender,phone,email,password) Values('$name','$username','$dob','$Gender','$phone','$Email','$password')";
  $sql_query=mysqli_query($link,$sql);
  if($sql_query==TRUE){
    echo "<script>alert('Registration Succesfull.');</script>"; 
    echo "<script>window.location.href = 'auth-login-basic.php'</script>";
    
  }
  else{
    echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
  
  }
  // Close connection
  mysqli_close($link);
}*/


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

    <title>Register </title>

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
        <div class="authentication-inner">
          <!-- Register Card -->
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
              
              <form id="formAuthentication" class="mb-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <?php if (isset($_GET['error'])) { ?>
                  <p class="error" style='color: green; font-weight:bold; text-align:center;'><?php echo $_GET['error']; ?></p>
                <?php } ?>

              <?php if (isset($_GET['success'])) { ?>
                  <p class="success" style='color: green; font-weight:bold; text-align:center;'
                  ><?php echo $_GET['success']; ?></p>
              <?php } ?>
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" />
                  <span class="error">* <?php echo $nameErr;?></span>
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Enter your username"
                    autofocus
                  />
                  <span class="error">* <?php echo $usernameErr;?></span>
                </div>
                <div class="mb-3">
                  <label for="age" class="form-label">Date of Birth</label>
                  <input type="date" class="form-control" id="age" name="dob"  />
                  <span class="error">* <?php echo $dobErr;?></span>
                </div>
                <div class="mb-3">
                  <label for="sex" class="form-label">Gender</label>
                  <select name="sex" id="sex" class="form-control">
                    <option value="1">Select Gender</option>
                    <option value="2">Male</option>
                    <option value="3">Female</option>
                  </select>
                  <span class="error">* <?php echo $sexErr;?></span>
                  
                </div>
                <div class="mb-3">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone"  />
                  <span class="error">* <?php echo $phoneErr;?></span>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
                  <span class="error">* <?php echo $emailErr;?></span>
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    <br>
                    <span class="error">* <?php echo $passwordErr;?></span>
                  </div>
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Confirm Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="c_password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    <br>
                    <span class="error">* <?php echo $cpasswordErr;?></span>
                  </div>
                </div>

                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                    <label class="form-check-label" for="terms-conditions">
                      I agree to
                      <a href="javascript:void(0);">privacy policy & terms</a>
                    </label>
                    <br>
                    <span class="error">* <?php echo $termsErr;?></span>
                  </div>
                </div>
                <button  name="submit" class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="auth-login-basic.php">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
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
