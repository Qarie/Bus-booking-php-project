<?php
// Initialize the session
session_start();
include'config.php';

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
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
  <link rel="stylesheet" href="">
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
          <!-- <li class="menu-item">
            <a href="add_employees.php" class="menu-link">
              <i class="fa fa-user"  ></i>
              <div data-i18n="Tables" style="padding-left: 20px;">Add Employee</div>
            </a>
          </li> -->


          <!-- Forms & Tables -->
          <!-- <li class="menu-item">
            <a href="passangers.php" class="menu-link">
            <i class="fa-solid fa-user" style="color:blue;" ></i>
            <div data-i18n="Tables" >Passengers</div>
            
          </a>
          </li> -->
          
          <li class="menu-item">
            <a href="drivers.php" class="menu-link">
              <i class="fa fa-road"  ></i>
              <div data-i18n="Tables" style="padding-left: 20px;">Route</div>
            </a>
          </li>
          <!-- <li class="menu-item">
            <a href="Buses.php" class="menu-link">
              <i class="fa fa-bus"  ></i>
              <div data-i18n="Tables" style="padding-left: 20px;">Buses</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="routem.php" class="menu-link">
              <i class="fa fa-user"  ></i>
              <div data-i18n="Tables" style="padding-left: 20px;">Route Managers</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="routes.php" class="menu-link">
              <i class="fa fa-road      "  ></i>
              <div data-i18n="Tables" style="padding-left: 20px;">Routes</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="bookings.php" class="menu-link">
              <i class="fa fa-book" ></i>
              <div data-i18n="Tables" style="padding-left: 20px;"></i>Bookings</div>
            </a>
          </li> -->
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
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
          <?php
          $username=$_SESSION['username'];
          $drill=mysqli_query($link,"select name from employees where username='$username' ");
          $execut=mysqli_fetch_assoc($drill);
          $rout=$execut['name'];
          $real=mysqli_query($link,"select name from routes where route_manager='$rout' ");
          $execute=mysqli_fetch_assoc($real);
          $route=$execute['name'];
										$querry=mysqli_query($link, "select bus from bookings where route='$route' ");
										$total=mysqli_num_rows($querry);
										
										?>
          <div class="row">
						<div class="col-md-6 col-xl-3">
							<div class="card">
								<div class="card-body">
									<div class="float-end mt-2">
										<div class="fa fa-bus fa-4x"></div>
									</div>
									<div>
										<h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo $total; ?></span></h4>
										<p class="text-muted mb-0">Buses</p>
									</div>
									<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class=""></i></span></p>
								</div>
							</div>
						</div>
						<!-- end col-->
						<div class="col-md-6 col-xl-3">
							<div class="card">
								<div class="card-body">
									<div class="float-end mt-2">
										<div class="fa fa-group fa-4x"> </div>
									</div>
									<div>
                  <?php
                   
                  $username=$_SESSION['username'];
                  $drill=mysqli_query($link,"select name from employees where username='$username' ");
                  $execut=mysqli_fetch_assoc($drill);
                  $rout=$execut['name'];
                  $real=mysqli_query($link,"select name from routes where route_manager='$rout' ");
                  $execute=mysqli_fetch_assoc($real);
                  $route=$execute['name'];
                  
    
                  
                  $querry=mysqli_query($link, "select driver from bookings where route='$route' ");
                  $total=mysqli_num_rows($querry);
										
										?>
										<h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo $total; ?></span></h4>
										<p class="text-muted mb-0">Drivers</p>
									</div>
									<p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i></span></p>
								</div>
							</div>
						</div>
						<!-- end col-->
						<!-- <div class="col-md-6 col-xl-3">
							<div class="card">
								<div class="card-body">
									<div class="float-end mt-2">
										<div class="fa fa-industry fa-4x"> </div>
									</div>
									<div> -->
                  <?php
										// $querry=mysqli_query($link, "select * from employees where role='Route Manager'");
										// $total=mysqli_num_rows($querry);
										
										?>
										<!-- <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo $total; ?></span></h4>
										<p class="text-muted mb-0">Route managers</p>
									</div>
									<p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="mdi mdi-arrow-down-bold me-1"></i></span> </p>
								</div>
							</div>
						</div> -->
						<!-- end col-->
						<!-- <div class="col-md-6 col-xl-3">
							<div class="card">
								<div class="card-body">
									<div class="float-end mt-2">
										<div class="fa fa-book fa-4x"></div>
									</div>
									<div> -->
                  <?php
                  // $username=$_SESSION['username'];
										// $querry=mysqli_query($link, "select * from bookings");
										// $total=mysqli_num_rows($querry);
										
										?>
										<!-- <h4 class="mb-1 mt-1"><span data-plugin="counterup"></span><?php echo $total; ?></h4>
										<p class="text-muted mb-0">Recent Bookings</p>
									</div>
									<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="mdi mdi-arrow-up-bold me-1"></i></span></p>
								</div>
							</div>
						</div> -->
						<!-- end col-->
          
                  <!-- </div>
    <div class="row"> -->
                  <!-- <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h5 class="text-nowrap mb-2">Profile Report</h5>
                                <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                              </div>
                              <div class="mt-sm-auto">
                                <small class="text-success text-nowrap fw-semibold"
                                  ><i class="bx bx-chevron-up"></i> 68.2%</small
                                >
                                <h3 class="mb-0">$84,686k</h3>
                              </div>
                            </div>
                            <div id="profileReportChart"></div>
                          </div>
                        </div>
                      </div>
                    </div> -->
          </div>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
          <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
              ©
              <script>
                document.write(new Date().getFullYear());
              </script>
              fast travels ltd

            </div>

          </div>
        </footer>
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
</body>

</html>