<?php
   session_start();
   include "php/db_conn.php"; 
   if(empty($_SESSION)){
    header('Location: ../index.php');
  }
  


            
   ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OBPPS - Businesses</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/OBPPSlogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script type="text/javascript">
    
    var street = ["Altavas Street","Arellano Street","Arnaldo Boulevard","Arsobispo Street","Bangbang Street","Banica","Barangay Culajao Road","Barangay II","Barangay III","Barangay IV","Barangay IX","Barangay Mongpong Road","Barangay VIII","Barra","Baybay","Bayot Drive","Bayot Street","Bilbao Street","Burgos Street","Cadimahan Road","Cagay","Calipayan Road","Capricho II Street","Culasi","Datiles Street","Dayao","Debonair Street","Eloisa Street","Fuentes Drive","Capiz State University","Fuentes Drive","Gomez Street","Hughes Street","Iloilo-Capiz Road","Inzo Arnaldo Village","Lapu-Lapu Street","Legazpi Street","Loctugan","Lopez Jaena Street","Lourdes Street","Luna Novicio Street","Mabini Street","Magallanes Street","McKinley Street","National Highway","Pavia Street","Plaridel Street","Premier de Mayo Street","Punta Cogon","Rizal Street","Roxas Airport Access Road","Roxas Avenue","Sacred Heart of Jesus Avenue","San Jose Street","San Roque Street","San Roque Street","Taft Street","Tanque","Teodorica Avenue","Unnamed Road","Zamora Street"];
    var countries = ["Adlawan","Bago","Balijuagan","Banica","Barra","Bato","Baybay","Bolo","Cabugao","Cagay","Cogon","Culajao","Culasi","Dayao","Dinginan","Dumulog","Gabuan","Inzo Arnaldo Village","Jumaguicjic","Lanot","Lawa-an","Libas","Liong","Loctugan","Lonoy","Milibili","Mongpong","Olotayan","Poblacion I","Poblacion II","Poblacion III","Poblacion IV","Poblacion VI","Poblacion VII","Poblacion VIII","Poblacion X","Poblacion XI","Punta Tabuc","San Jose","Sibaguan","Talon","Tanque","Tanza","Tiza"];
    function realTime() {
    
    var date = new Date();
    var hour = date.getHours();
    var min = date.getMinutes();
    var sec = date.getSeconds();
    var halfday = "AM";
    var now = (new Date()).toString().split(' ').splice(1,3).join(' ');

    halfday = (hour >= 12) ? "PM" : "AM";
    hour = (hour == 0) ? 12 : ((hour > 12) ? (hour - 12): hour);
    hour = update(hour);
    min = update(min);
    sec = update(sec);
    document.getElementById("h").innerText = hour;
    document.getElementById("m").innerText = min;
    document.getElementById("s").innerText = sec;
    document.getElementById("ap").innerText = halfday;
    document.getElementById("date").innerText = now;

    setTimeout(realTime, 1000);
    }

    function update(k) {
    if (k < 10) { return "0" + k; } else { return k; } }
  </script>
  <style>
      * { box-sizing: border-box; }
      body {
        font: 16px Arial;
      }
      .autocomplete {
        /*the container must be positioned relative:*/
        position: relative;
        display: inline-block;
      }
      input {
        border: 1px solid transparent;
        background-color: #f1f1f1;
        padding: 10px;
        font-size: 16px;
      }
      input[type=text] {
        background-color: #f1f1f1;
        width: 100%;
      }
      input[type=submit] {
        background-color: DodgerBlue;
        color: #fff;
      }
      .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
      }
      .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
      }
      .autocomplete-items div:hover {
        /*when hovering an item:*/
        background-color: #e9e9e9;
      }
      .autocomplete-active {
        /*when navigating through the items using the arrow keys:*/
        background-color: DodgerBlue !important;
        color: #ffffff;
      }
  </style>
  


  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body onload="realTime()">
  

  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/OBPPSlogo.png" alt="">
        <span class="d-none d-lg-block">OBPPS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
        <li class="nav-item d-lg-block">
          <span id="date"></span>--
          <span id="h"></span>:
          <span id="m"></span>:
          <span id="s"></span>
          <span id="ap"></span>
          
        </li>

        <li class="nav-item d-lg-block">
          <p id="txt"></p>
          
        </li>

       <!--  <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul>

        </li> -->
        <!-- End Notification Nav -->

       <!--  <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul>
        </li> -->
        <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo $_SESSION['photo']; ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['firstName']." ".$_SESSION['lastName']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['firstName']." ".$_SESSION['lastName']; ?></h6>
              <span>User</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-house-door"></i>
          <span>Home Page</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if($page != "services") echo "collapsed";?>" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bx-wrench"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content <?php if($page != "services") echo "collapse";?> " data-bs-parent="#sidebar-nav">
          <li>
            <a href="pages-new-business.php" class="<?php if($subpage == "newBusiness") echo "active" ?>">
              <i class="bi bi-circle"></i><span>New Business Registration</span>
            </a>

          </li>
          <li>
            <a href="pages-renew-businesses.php" class="<?php if($subpage == "renewBusiness") echo "active" ?>">
              <i class="bi bi-circle"></i><span>Renewal of Business</span>
            </a>
          </li>
          <li>
            <a href="pages-retirement-businesses.php" class="<?php if($subpage == "retireBusiness") echo "active" ?>">
              <i class="bi bi-circle"></i><span>Retirement Process</span>
            </a>
          </li>
          <li>
            <a href="pages-my-businesses.php" class="<?php if($subpage == "myBusinesses") echo "active" ?>">
              <i class="bi bi-circle"></i><span>My Businesses</span>
            </a>
          </li>
          <li>
            <a href="pages-list-of-requirements.php" class="<?php if($subpage == "requirements") echo "active" ?>">
              <i class="bi bi-circle"></i><span>List of Requirements</span>
            </a>
          </li>         
        </ul>
      </li><!-- End Services Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->   

    </ul>
  </aside>
