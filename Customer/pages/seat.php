<?php
// Initialize the session
session_start();
include'config.php';
// if($loggedIn && $_SERVER["REQUEST_METHOD"] == "POST")
//         {
            if(isset($_POST["submit"]))
            {
                

                $username=$_SESSION["username"];
                $get="select * from customers where username = '$username' ";
                $run=mysqli_query($link,$get);
                $row=mysqli_fetch_assoc($run);
                $name = $row['name'];
                $phone = $row['phone'];
                $email = $row['email'];
                $username = $row['username'];
                $id=$_GET['id'];
                $bus = "select * from bus where id = '$id' ";
                $rus=mysqli_query($link,$bus);
                $ror=mysqli_fetch_assoc($rus);
                // $name = $row['name'];
                $plate=$ror['plate'];
                $route=$ror['route'];
                $amount=$ror['amount'];
                $comp=$ror['company'];
                
                $booked_seat = $_POST["seatInput"];
                // $amount = $_POST["bookAmount"];
                // $dep_timing = $_POST["dep_timing"];
                $sql="INSERT INTO bookings (name,bus,route,company,seat,date,amount,phone,email,username)VALUES('$name','$plate','$route','$comp','$booked_seat',current_timestamp(),'$amount','$phone','$email','$username')";
                $query=mysqli_query($link,$sql);
                if ($query==TRUE){
                  # code...
                  // $book = "select id from bookings ";
                  // $rex=mysqli_query($link,$book);
                  // $rory=mysqli_fetch_assoc($rex);
                  // $id=$rory['id'];
                  // echo $seat;
                  header("Location:payment.php?seat=$booked_seat");
                  
                }

                
            }
          //}

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
  <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    
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
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <style>
    *{
    font-family: Montserrat;
    }

    .error{
        font-size: 15px;
        color: red;
    }


    #booking #head, 
    #customer #head,
    #route #head,
    #seat #head,
    #bus #head
    {
        /* display: flex;
        justify-content: space-between; */
        padding-top: 1rem;
    }


    #head #search{
        display: flex;
        align-items: center;
    }

    #search #wrapper{
        border: 2px solid black;
        border-radius: 20px;
        background-color: white;
        padding: 0.1rem 0.5rem;
    }

    #wrapper input{
        border: none;
        font-size: 17px;
        outline: none;
    }

    #wrapper a{
        color: #8B8989;

    }

    #wrapper a:hover{
        color: black;

    }

    #booking,
    #customer,
    #route,
    #bus,
    #seat
    {
        padding: 0 1rem;
    }

    #booking-results > div,
    #customer-results > div,
    #route-results > div,
    #bus-results > div
    {
        margin-bottom: 0.5rem;
    }

    #booking-results button,
    #customer-results button,
    #route button,
    #bus-results button
    {
        /* padding: 0.3rem 1rem; */
        border-radius: 5px;
    }

    .button{
        border: none;
        font-weight: bold;
        text-transform: uppercase;
    }

    #add-button{
        background-color: black;
        color: white;
    }

    #route table{
        width: 100%;
    }

    table{
        font-size: 14px;
    }

     #bus table{
        width: 50%;
        margin: 0 auto;
    }

    #bus .edit-button,
    #bus .delete-button,
    #route .edit-button,
    #route .delete-button,
    #customer .edit-button,
    #customer .delete-button{
        padding: 0.3rem 0.7rem;
    }
    /* #booking table{
        width: 100%;
    } */


    table th,td{
        padding-left: 0.3rem;
    }

    table button{
        color: white;
    }

    .edit-button{
        background-color: #4370E2;
    }

    .delete-button{
        background-color: #EF0000;
    }

    .edit-button,
    .delete-button{
        font-size: 10px
    }

    .disabled{
        opacity: 0.5;
    }

    .editRouteForm input{
        margin: 0 1rem; 
    }

    .editRouteForm input.cost{
        flex-basis: 15%;
    }

    .editRouteForm input.time,
    .editRouteForm input.date,
    .editRouteForm > div.searchBus{
        flex-basis: 40%;
    }

    .editRouteForm input.busnoInput{
        width: 100%;
        margin: 0;
    }

    #noRoutes,
    #noCustomers{
        background-color: black;
        color: white;
    }

    /* For seat.html */
    #main form{
        display: flex;
    }

    #main form input, 
    #main form button{
        margin: 0;
        padding: 0.4rem  1rem;
        font-size: 1.1rem;
    }

    #main form input{
        border-radius: 5px 0px 0px 5px;
        outline: none;
        border: 2px solid grey;
    }

    #main form button{
        background-color: black;
        color: white;
        border: none;
        border-radius: 0px 5px 5px 0px;
    }

    .hl{
        background-color: #79ff9c; 
    }

    .editRouteForm .searchBus{
        margin: 0 1rem;
    }

    .searchBus{
        position: relative;
    }

    .sugg{
        background-color: white;
        position: absolute;
        margin-top: 0.4rem;
        width:100%;
        border-radius: 5px;
        max-height: 114px;
        overflow: auto;
    }

    .editRouteForm .sugg{
    }

    .sugg li{
        border: solid #b0b0b0;
        border-width: 0 2px 2px 2px;
        border-radius: 5px;
        list-style-type: none;
        padding: 0.35rem 0.8rem;
    }

    .sugg li:first-child{
        border-top-width: 2px;
    }
    .sugg li:hover{
        cursor: pointer;
        background-color: #b0b0b0;
    }
    /* styles for Booking.php Forms nd all */
    #seatsDiagram td,
    #displaySeats td{
        padding: 1rem;
        text-align: center;
        margin: 0.3rem;
        width: 60px;
        border: 3px solid transparent;
        display: inline-block;
        background-color: #efefef;
        border-radius: 5px;
    }

    #displaySeats{
        margin: 3rem auto 1rem auto;
    }


    #seatsDiagram{
        width: 100%;
        margin-bottom: 1rem;
    }

    #seatsDiagram  td.selected{
        background-color: greenyellow;
        -webkit-animation-name: rubberBand;
        animation-name: rubberBand;
        animation-duration: 300ms;
        animation-fill-mode: both;
    }

    #seatsDiagram td.notAvailable,
    #displaySeats td.notAvailable
    {
        color: white;
        background-color: #db2619;
    }

    #seatsDiagram td:not(.space,.notAvailable):hover{
        cursor: pointer;
        border-color:greenyellow;
    }

    #seatsDiagram .space,
    #displaySeats .space{
        background-color: white;
        border: none;
    }

    #routeSugg{
        display: flex;
        justify-content: space-between;
    }
    
    @-webkit-keyframes rubberBand {
        0% {
            -webkit-transform: scale3d(1, 1, 1);
                    transform: scale3d(1, 1, 1);
        }

        30% {
            -webkit-transform: scale3d(1.25, 0.75, 1);
                    transform: scale3d(1.25, 0.75, 1);
        }

        40% {
            -webkit-transform: scale3d(0.75, 1.25, 1);
                    transform: scale3d(0.75, 1.25, 1);
        }

        50% {
            -webkit-transform: scale3d(1.15, 0.85, 1);
                    transform: scale3d(1.15, 0.85, 1);
        }

        65% {
            -webkit-transform: scale3d(.95, 1.05, 1);
                    transform: scale3d(.95, 1.05, 1);
        }

        75% {
            -webkit-transform: scale3d(1.05, .95, 1);
                    transform: scale3d(1.05, .95, 1);
        }

        100% {
            -webkit-transform: scale3d(1, 1, 1);
                    transform: scale3d(1, 1, 1);
        }
        }

        @keyframes rubberBand {
        0% {
            -webkit-transform: scale3d(1, 1, 1);
                    transform: scale3d(1, 1, 1);
        }

        30% {
            -webkit-transform: scale3d(1.25, 0.75, 1);
                    transform: scale3d(1.25, 0.75, 1);
        }

        40% {
            -webkit-transform: scale3d(0.75, 1.25, 1);
                    transform: scale3d(0.75, 1.25, 1);
        }

        50% {
            -webkit-transform: scale3d(1.15, 0.85, 1);
                    transform: scale3d(1.15, 0.85, 1);
        }

        65% {
            -webkit-transform: scale3d(.95, 1.05, 1);
                    transform: scale3d(.95, 1.05, 1);
        }

        75% {
            -webkit-transform: scale3d(1.05, .95, 1);
                    transform: scale3d(1.05, .95, 1);
        }

        100% {
            -webkit-transform: scale3d(1, 1, 1);
                    transform: scale3d(1, 1, 1);
        }
        }

        .rubberBand {
        -webkit-animation-name: rubberBand;
                animation-name: rubberBand;
        }
</style>
  <style>
    body{
    margin: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
    background-color: white;
    }

    html{
        scroll-behavior: smooth;
    }

    *, *::after, *::before{
        box-sizing: inherit;
    }

    /* #navbar{
        background-color: black;
        color: white;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        position: fixed;
        z-index: 1;
        top: 0;
        width: 100%;
    }

    #navbar ul{
        list-style-type: none;
        padding: 0.4rem 0;
        margin: 0;
        display: flex;
    }

    .nav-item{
        margin: 0 0.3rem;
        display: flex;
        justify-content: center;
        align-items: center;
    } */

    #USER{
        color: #207DFF;
    }


    .adminDp{
        border-radius: 50%;
    }

    #welcome{
        background-color: white;
        /* border-bottom: 1px solid rgb(19, 18, 18); */
    }

    #welcome ul{
        display: flex;
        justify-content: space-between;
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    #welcome li{
        margin: 0 1rem;
        padding: 0.5rem 0;
    }

    #welcome li:first-child{
        font-weight: 800;
        font-size: 1.4rem;
    }

    #logout{
        padding: 0.3rem 0.7rem;
        background-color: #207DFF;
        font-weight: 600;
        outline: none;
        border: none;
        border-radius: 7px;
    }

    #logout a{
        color: white;
        text-decoration: none;
    }

    footer{
        border-top: 2px solid #e2e2e2;
        padding: 0.5rem 0;
        text-align: center;
        font-weight: bold;
    }

    footer p{
        margin: 0;
    }

    @media only screen and (min-width:1000px){
        #sidebar{
            text-align: center;
            /* background-color: #207DFF; */
            background-color: #3885c5;
            color: white;
            width: 15%;
            position: fixed;
            top: 0%;
            padding-top: 1rem;
            z-index: 2;
            height: 100vh;
        }
        #sidebar h3{
            margin: 0.5rem 0;
        }

        #sidebar p{
            margin: 0;
        }

        #sidebar ul{
            margin-top: 2rem;
        }

        #options{
            list-style-type: none;
            text-align: left;
            padding-left: 0;
        }
        .option a{
            display: block;
            padding: 0.5rem;
            text-decoration: none;
            color: inherit;
        }

        .active {
            background-color:#f7f7f7;
            color:black;
        }

        .option a:hover{
            color: black;
            background-color: white;
        }

        #main-content{
            margin-left: 16%;
        }

        .info-box{
            flex-basis: 20%;
        }
    }
</style>
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
                <i class=""></i>
                <div data-i18n="Tables">Passengers</div>
              </a>
            </li> -->
            <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div data-i18n="Form Elements">Bus Companies</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="buscomp.php" class="menu-link">
                  <div data-i18n="Basic Inputs">Available</div>
                </a>
              </li>
              <!-- <li class="menu-item">
                <a href="buscomp.php" class="menu-link">
                  <i class=""></i>
                  <div data-i18n="Tables">Full</div>
                </a>
              </li> -->
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div data-i18n="Form Elements">Bookings</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="bookings.php" class="menu-link">
                  <div data-i18n="Basic Inputs">Previous Bookings</div>
                </a>
              </li>
              <!-- <li class="menu-item">
                <a href="buscomp.php" class="menu-link">
                  <i class=""></i>
                  <div data-i18n="Tables"></div>
                </a>
              </li> -->
            </ul>
          </li>
          
          <!-- <li class="menu-item">
            <a href="buscomp.php" class="menu-link">
              <i class=""></i>
              <div data-i18n="Tables"><i class="fa fa-bus" aria-hidden="true"></i> </> Bus Companies</div>
            </a>
          </li> -->
          
          <!-- <li class="menu-item">
              <a href="tables-basic.html" class="menu-link">
                <i class=""></i>
                <div data-i18n="Tables">Payments</div>
              </a>
            </li> -->
          <!-- <li class="menu-item">
            <a href="bookings.php" class="menu-link">
              <i class=""></i>
              <div data-i18n="Tables"><i class="fa fa-book" aria-hidden="true"></i>  Bookings</div>
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
        <!-- <div class="content-wrapper"> -->
        <!-- Content -->

        <!-- <div class="container-xxl flex-grow-1 container-p-y"> -->


        
        <div class="container">
          <div class="card">
            <div class="form">
              
                  <div class="modal-body">
                        <form id="addBookingForm"  method="POST">
                           
                                
                            <!-- Seats Diagram -->
                            <div class="mb-3">
                                <table id="seatsDiagram">
                                <tr>
                                    <td id="seat-1" data-name="1">&nbsp;</td>
                                    <td id="seat-1" data-name="1">1</td>
                                    <!-- <td id="seat-3" data-name="3">3</td> -->
                                    <td id="seat-5" data-name="5">5</td>
                                    <!-- <td id="seat-7" data-name="7">7</td> -->
                                    <td id="seat-9" data-name="9">9</td>
                                    <!-- <td id="seat-11" data-name="11">11</td> -->
                                    <td id="seat-13" data-name="13">13</td>
                                    <td id="seat-15" data-name="15">15</td>
                                    <td id="seat-17" data-name="17">17</td>
                                    <td id="seat-19" data-name="19">19</td>
                                    <td id="seat-21" data-name="21">21</td>
                                    <td id="seat-23" data-name="23">23</td>
                                    <td id="seat-25" data-name="25">25</td>
                                </tr>
                                <tr>
                                    
                                    <td class="space">&nbsp;</td>
                                    <td id="seat-2" data-name="2">2</td>
                                    <!-- <td id="seat-4" data-name="4">4</td> -->
                                    <td id="seat-6" data-name="6">6</td>
                                    <!-- <td id="seat-8" data-name="8">8</td> -->
                                    <td id="seat-10" data-name="10">10</td>
                                    <!-- <td id="seat-12" data-name="12">12</td> -->
                                    <td id="seat-14" data-name="14">14</td>
                                    <td id="seat-16" data-name="16">16</td>
                                    <td id="seat-18" data-name="18">18</td>
                                    <td id="seat-20" data-name="20">20</td>
                                    <td id="seat-22" data-name="22">22</td>
                                    <td id="seat-24" data-name="24">24</td>
                                    <td id="seat-26" data-name="26">26</td>
                                </tr>
                                <tr>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                        <td class="space">&nbsp;</td>
                                </tr>
                                <tr>
                                    <!-- <td id="seat-21" data-name="21">21</td> -->
                                    <td class="space">&nbsp;</td>
                                    <td id="seat-3" data-name="3">3</td>
                                    <td id="seat-7" data-name="7">7</td>
                                    <!-- <td id="seat-25" data-name="25">25</td> -->
                                    <td id="seat-11" data-name="11">11</td>
                                    <td id="seat-29" data-name="29">29</td>
                                    <td id="seat-31" data-name="32">31</td>
                                    <td id="seat-33" data-name="33">33</td>
                                    <!-- <td class="space">&nbsp;</td> -->
                                    <td id="seat-35" data-name="35">35</td>
                                    <td id="seat-37" data-name="37">37</td>
                                    <td id="seat-39" data-name="39">39</td>
                                </tr>
                                <tr>
                                    <!-- <td id="seat-22" data-name="22">22</td> -->
                                    <td class="space">&nbsp;</td>
                                    <td id="seat-4" data-name="4">4</td>
                                    <td id="seat-8" data-name="8">8</td>
                                    <!-- <td id="seat-26" data-name="26">26</td> -->
                                    <td id="seat-12" data-name="12">12</td>
                                    <td id="seat-30" data-name="30">30</td>
                                    <td id="seat-32" data-name="32">32</td>
                                    <td id="seat-34" data-name="34">34</td>
                                    <!-- <td class="space">&nbsp;</td> -->
                                    <td id="seat-36" data-name="36">36</td>
                                    <td id="seat-38" data-name="38">38</td>
                                    <td id="seat-40" data-name="40">40</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row g-3 align-items-center mb-3">
                                <div class="col-auto">
                                    <label for="seatInput" class="col-form-label">Seat Number</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="seatInput" class="form-control" name="seatInput" readonly>
                                </div>
                                <div class="col-auto">
                                    <span id="seatInfo" class="form-text">
                                    Select from the above figure, Maximum 1 seat.
                                    </span>
                                </div>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="bookAmount" class="form-label">Total Amount</label>
                                <input type="text" class="form-control" id="bookAmount" name="bookAmount" readonly>
                            </div> -->
                            <button type="submit" class="btn btn-success" name="submit">Submit</button>
                        </form>
                    </div>
                    
                    
                  </div>
                </div>
            </div>
            <script src="js/form.js"></script>
           









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
      $(document).ready(function () {
        $(document).on('click', '.edit_data', function () {
          var edit_id = $(this).attr('id');
          $.ajax({
            url: "add_company.php",
            type: "post",
            data: { edit_id: edit_id },
            success: function (data) {
              $("#info_update").html(data);
              $("#editData").modal('show');
            }
          });
        });
      });
    </script>
    <script>

      // Selecting Seats
      const seatDiagram = document.querySelector("#seatsDiagram");
      const seatInputInput = document.querySelector("#seatInput");
      seatDiagram.addEventListener("click", selectSeat);
      let selected_id; 

      function selectSeat(evt)
      {
        if(evt.target.nodeName == "TD" && !evt.target.className.includes("space") && !evt.target.className.includes("notAvailable"))
        {
          if(!selected_id || evt.target.dataset.name === selected_id)
          {
            selected_id = evt.target.dataset.name;
            evt.target.classList.toggle("selected");

            if(!evt.target.className.includes("selected"))
            {
              selected_id = "";
            }

            seatInput.value = selected_id;

            if(selected_id)
            {
              // Put a value for amount
              const sourceSelected = document.querySelector("#sourceSearch").value;
              const destSelected  = document.querySelector("#destinationSearch").value;
              const citiesArr = convertToArray(document.querySelector("#routeSearch").dataset.id);

              console.log(sourceSelected, destSelected, citiesArr);
              const stepCost = document.querySelector("#routeSearch").dataset.stepcost;

              const amount = (citiesArr.indexOf(destSelected) - citiesArr.indexOf(sourceSelected)) * parseInt(stepCost);
              console.log(citiesArr.indexOf(destSelected), citiesArr.indexOf(sourceSelected), stepCost);
              document.querySelector("#bookAmount").value = amount;
            }
          }
        }
        
      }
      function lockSuggestion(evt)
{
  const searchInput = this.previousElementSibling;

  if(searchInput.id == "cid")
  {
    const customerName = document.querySelector("#cname");
    const customerPhone = document.querySelector("#cphone");
    const findCustomer = customerData.find(({customer_id}) => customer_id === evt.target.innerText);
    
    customerName.value = findCustomer.customer_name;
    customerPhone.value = findCustomer.customer_phone;
  }

  else if(searchInput.id === "routeSearch")
  {
    // Set the route_id & depDate
    const route_id = evt.target.dataset.id;
    const dep_timing = evt.target.dataset.deptiming;
    document.querySelector("#route_id").value = route_id;
    document.querySelector("#dep_timing").value = dep_timing;

    // Pass the route_id to the searchInput's dataset 
    searchInput.setAttribute("data-id", route_id);
    searchInput.setAttribute("data-deptiming", dep_timing);
    searchInput.setAttribute("data-stepcost", evt.target.dataset.stepcost);

    // If there are just 2 cities, then fix source and destination as the 1st and 2nd city respectively
    // Converting comma separated cities to an array
    const citiesArr = convertToArray(route_id);

    if(citiesArr.length === 2)
    {
      document.querySelector("#sourceSearch").value = citiesArr[0];
      document.querySelector("#destinationSearch").value = citiesArr[1];
    }
    // So that timing is avoided when selecting the route
      evt.target.innerText = evt.target.firstElementChild.innerText;

    // To Color the not Available Seats in this route
    const route_busNo = routeData.find(({route_id:id}) => {
      return id === route_id
    }).bus_no;

    console.log(seatData.find(({bus_no}) => 
    {
      console.log(bus_no, route_busNo);
     return bus_no === route_busNo;
    }));
    let seatsBooked = seatData.find(({bus_no}) => 
    {
      console.log(bus_no, route_busNo);
     return bus_no === route_busNo;
    }).seat_booked;

    // If already booked seats exists
    if(seatsBooked)
    {
      seatsBooked = seatsBooked.split(",");
      seatsBooked.forEach(seatNo => {
        const seat = document.querySelector(`#seat-${seatNo}`);
        seat.classList.add("notAvailable");
      })
    }
  }
  // This is default
  searchInput.value = evt.target.innerText;
  this.innerText = "";
}
    </script>
    <!-- JQUERY -->
		<script src="js/jquery-3.3.1.min.js"></script>

<!-- JQUERY STEP -->
<script src="js/jquery.steps.js"></script>
<script src="js/main.js"></script>
<script src="assets/scripts/admin_booking.js"></script>
           

<!-- Template created and distributed by Colorlib -->
</body>

</html>