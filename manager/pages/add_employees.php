<?php
// Initialize the session
session_start();
require_once "config.php";

//form validations
   // define variables and set to empty values
   $nameErr = $usernameErr = $dobErr = $sexErr = $phoneErr = $emailErr = $roleErr = $passwordErr = "";
   $name = $username = $dob = $sex = $phone = $email = $role = $password = "";
   
   
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
      if (empty($_POST["gender"])) {
        $sexErr = "Gender is required";
      } else {
        $sex = test_input($_POST["gender"]);
    
      }
      
      if (empty($_POST["phone"])) {
        $phoneErr = "phone is required";
      } else {
        $phone = test_input($_POST["phone"]);
        // check if phone number is well-formed
        if (!preg_match("/^[0-9]{10}+$/",$phone)) {
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
      if (empty($_POST["role"])) {
        $roleErr = "role is required";
      } else {
        $role = test_input($_POST["role"]);
    
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
      
    }
   
   function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }

   if(isset($_POST['submit'])) {  
    if($nameErr == "" && $usernameErr == "" && $dobErr == "" && $sexErr == "" && $phoneErr == "" && $emailErr == "" && $roleErr == "" && $passwordErr == "") {
      $sql="INSERT INTO employees (name,username,dob,gender,phone,email,role,password) Values('$name','$username','$dob','$sex','$phone','$email','$role','$password')";
      $sql_query=mysqli_query($link,$sql);
      if($sql_query==TRUE){
        header("Location: add_employees.php?success=User has been added successfully");
	      exit();
      }else{
        header("Location: add_employees.php?error=unknown error occurred");
		    exit();
      }
      

     }
    }



?>



<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Admin Dashboard</title>

  <meta name="description" content="" />

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

  <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css"> -->

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>
  <script src="https://kit.fontawesome.com/1c867941a3.js" crossorigin="anonymous"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="dashboard.php" class="app-brand-link">
            <span class="app-brand-logo demo">
              <img src="../assets/img/logo1.png" alt="">
            </span>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item active">
            <a href="dashboard.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>


          <!-- Forms & Tables -->
          <!-- <li class="menu-item">
            <a href="passangers.php" class="menu-link">
            <i class="fa-solid fa-user" style="color:blue;" ></i>
            <div data-i18n="Tables" >Passengers</div>
            
          </a>
          </li> -->
          <li class="menu-item">
            <a href="add_employees.php" class="menu-link">
              <i class="fa-solid fa-user" style="color:blue;" ></i>
              <div data-i18n="Tables">Add Employees</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="drivers.php" class="menu-link">
              <i class="fa-solid fa-user" style="color:blue;" ></i>
              <div data-i18n="Tables">Drivers</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="buses.php" class="menu-link">
              <i class="fa-solid fa-user" style="color:blue;" ></i>
              <div data-i18n="Tables">Buses</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="routem.php" class="menu-link">
              <i class="fa-solid fa-user" style="color:blue;" ></i>
              <div data-i18n="Tables">Route Managers</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="routes.php" class="menu-link">
              <i class="fa-solid fa-user" style="color:blue;" ></i>
              <div data-i18n="Tables">Routes</div>
            </a>
          </li>
          <!-- <li class="menu-item">
            <a href="tables-basic.html" class="menu-link">
              <i class="fa-solid fa-user" style="color:blue;" ></i>
              <div data-i18n="Tables">Payments</div>
            </a>
          </li> -->
          <li class="menu-item">
            <a href="bookings.php" class="menu-link">
              <i class="fa-solid fa-edit" style="color:blue;" ></i>
              <div data-i18n="Tables">Bookings</div>
            </a>
          </li>
          <!-- Forms -->


        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                  aria-label="Search..." />
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->
              <!-- <li class="nav-item lh-1 me-3">
                <a class="github-button" href="https://github.com/themeselection/sneat-html-admin-template-free"
                  data-icon="octicon-star" data-size="large" data-show-count="true"
                  aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
              </li> -->

              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  
                  
                  <li>
                    <a class="dropdown-item" href="profile.php">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="logout.php">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <!-- <div class="container-xxl flex-grow-1 container-p-y"> -->



          <div class="container-xxl flex-grow-1 container-p-y">
            <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Bus Companies</h4> -->


            <!-- Basic Bootstrap Table -->
            <div class="card">
              <!-- <h5 class="card-header"></h5> -->
              <!-- <div class="card-tools" style="padding-top: 30px; padding-left: 20px;">
                <a href="add_company.php"><button  type="button" class="btn btn-sm btn-primary edit_data" title="click for edit"><span style="color: #fff;"><i
                        class="fas fa-plus"></i> Add Bus Company</span></a>
                  </button>
              </div> -->
              <!-- <div class="card-body mt-2 " > -->
              <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Employees</h4><hr><br>
                  <form class="form-sample" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <?php if (isset($_GET['error'])) { ?>
                  <p class="error" style='color: green; font-weight:bold; text-align:center;'><?php echo $_GET['error']; ?></p>
                <?php } ?>

              <?php if (isset($_GET['success'])) { ?>
                  <p class="success" style='color: green; font-weight:bold; text-align:center;'
                  ><?php echo $_GET['success']; ?></p>
              <?php } ?>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" placeholder="john doe"/><br>
                            <span class="error">* <?php echo $nameErr;?></span>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" placeholder="username"/><br>
                            <span class="error">* <?php echo $usernameErr;?></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date of Birth</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control"  name="dob" /><br>
                            <span class="error">* <?php echo $dobErr;?></span>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-9">
                            <select class="form-control" name='gender'>
                              <option value="">--select--</option>
                              <option>Male</option>
                              <option>Female</option>
                            </select>
                            <span class="error">* <?php echo $sexErr;?></span>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone" placeholder="077**********"/><br>
                            <span class="error">* <?php echo $phoneErr;?></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input class="form-control" name='email'placeholder="example@example.example"/>
                            <span class="error">* <?php echo $emailErr;?></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row" style=" padding-top: 25px; padding-bottom: 25px;">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Role</label>
                          <div class="col-sm-9">
                            <select class="form-control" name='role'>
                              <option value="">--select--</option>
                              <option>Driver</option>
                              <option>Route Manager</option>
                              <!-- <option>Transport Officer</option>
                              <option>Receptionist</option> -->
                            </select>
                            <span class="error">* <?php echo $roleErr;?></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <input class="form-control" name = 'password'placeholder="password"/>
                            <span class="error">* <?php echo $passwordErr;?></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    
                      <div class="col-md-6">
                        <button type="submit" name='submit'class="btn btn-primary">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
              </div>
            </div>
          </div> <!-- / B -->











          <!-- Footer -->
          <!-- <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                ©
                <script>
                  document.write(new Date().getFullYear());
                </script>
                fast travels ltd

              </div>

            </div>
          </footer> -->
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->



  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../plugins/moment/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- DataTables -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

<script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click','.edit_data',function(){
          var edit_id=$(this).attr('id');
          $.ajax({
            url:"add_company.php",
            type:"post",
            data:{edit_id:edit_id},
            success:function(data){
              $("#info_update").html(data);
              $("#editData").modal('show');
            }
          });
        });
      });
    </script>
</body>

</html>