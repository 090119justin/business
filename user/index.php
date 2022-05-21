<?php 
    session_start();
    include "../php/db_conn.php"; 

    $result = $conn->query("SELECT count(*) as businesses from business where status = 'verified' or status ='renewed';") or die($conn->error);
    $row = $result->fetch_assoc();

    $gender_count = $conn->query("SELECT 
          count(case when gender='Male' then 1 end) as male_cnt,
          count(case when gender='Female' then 1 end) as female_cnt,
          count(case when gender='Others' then 1 end) as others_cnt,
          count(*) as total_cnt
        from personal_information
        left join owner on personal_information.id = owner.infoId
        left join business on owner.id = business.ownerId
        where business.status = 'verified' or business.status = 'renewed';") or die($conn->error);
    $gender_row = $gender_count->fetch_assoc();

   ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OBPPS - Homepage</title>
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
  <style type="text/css">
    .map-responsive{
      overflow:hidden;
      padding-bottom:400px;
      position:relative;
      height:0;
    }
  .map-responsive iframe{
      left:0;
      top:0;
      height:400px;
      width:100%;
      position:absolute;
    }
  </style>
  <script type="text/javascript">
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
</head>
<body onload="realTime()">
  <?php if (isset($_SESSION['role'])){

  if ($_SESSION['role'] == 'user') { ?>
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

        </li> --><!-- End Notification Nav -->

        <!-- <li class="nav-item dropdown">

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

        </li> --><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo $_SESSION['photo'] ?>" alt="Profile" class="rounded-circle">
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
        <a class="nav-link " href="index.php">
          <i class="bi bi-house-door"></i>
          <span>Home Page</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bx-wrench"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="pages-new-business.php">
              <i class="bi bi-circle"></i><span>New Business Registration</span>
            </a>
          </li>
          <li>
            <a href="pages-renew-businesses.php">
              <i class="bi bi-circle"></i><span>Renewal of Business</span>
            </a>
          </li>
          <li>
            <a href="pages-retirement-businesses.php">
              <i class="bi bi-circle"></i><span>Retirement of Business</span>
            </a>
          </li>
          <li>
            <a href="pages-my-businesses.php">
              <i class="bi bi-circle"></i><span>My Businesses</span>
            </a>
          </li>
          <li>
            <a href="pages-list-of-requirements.php">
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

  <main id="main" class="main">
    <div class="pagetitle" >
      <h1>Welcome!</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Home Page</li>
          
        </ol>
      </nav>
     



    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Start: Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Online Business Permit Processing System</h5>

                <!-- Slides with captions -->
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="assets/img/slides-1.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="assets/img/slides-2.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="assets/img/slides-3.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="assets/img/slides-4.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="assets/img/slides-5.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        
                      </div>
                    </div>
                  </div>

                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>

                </div><!-- End Slides with captions -->

              </div>
            </div>           

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Mission</h5>
                 The Online Business Permits Processing System of the City Government of Roxas City, Capiz exists to provide quality public service to the city’s process through the online system program which ensures efficient, fast and quality public service toward achieving a business-friendly environment.
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Vision</h5>
                  The Online Business Permits Processing System of Roxas City is the Model OBPPS in the entire roxas through its excellent implementation of the ONLINE system and other innovative programs that facilitate the conduct of legitimate private enterprise as a strategic means to enhance the city’s competitiveness as an investment destination.
              </div>
            </div><!-- End Default Card -->
            
          </div>
        </div><!-- End: Left side columns -->
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body" style="padding-top: 35px;">
             

              <nav class="d-flex justify-content-center">
                <ol class="breadcrumb">
                  <li ><img src="assets/img/OBPPSlogo-modified.png" style="width: 88px; height: 88px; margin: 1px;"></li>
                  <li ><img src="assets/img/ccs.png" style="width: 88px; height: 88px; margin: 1px;"></li>
                  <li ><img src="assets/img/cropped-HDlogo.png" style="width: 88px; height: 88px; margin: 1px;"></li>
                </ol>
              </nav>
            </div>
          </div>

          <div class="card info-card revenue-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title"><p>Registerd Businesses</p> <span>| This Month</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bx bxs-business"></i>
                </div>
                <div class="ps-3">
                  <h6><?php echo $row['businesses']; ?></h6>
                  <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>
            </div>

          </div>
          <!-- Business Owners -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Business Owners</h5>

              <!-- Pie Chart -->
              <div id="pieChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#pieChart")).setOption({
                    
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      orient: 'vertical',
                      left: 'left'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: '50%',
                      data: [{
                          value: <?php echo $gender_row['male_cnt']; ?>,
                          name: 'male'
                        },
                        {
                          value: <?php echo $gender_row['female_cnt']; ?>,
                          name: 'Female'
                        },
                        {
                          value: <?php echo $gender_row['others_cnt']; ?>,
                          name: 'Others'
                        }
                      ],
                      emphasis: {
                        itemStyle: {
                          shadowBlur: 10,
                          shadowOffsetX: 0,
                          shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                      }
                    }]
                  });
                });
              </script>
              <!-- End Pie Chart -->

            </div>
          </div><!-- End Business Owners -->
          <!-- News & Updates Traffic -->
          
        </div>
        
      </div>
    </section>
      <section>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">City Government of Roxas City <br>FLOW CHART <br>Processing Business Permit</h5>
            <img src="assets/img/flowchart.png" style="width:100%;object-fit: cover;">
            
          </div>
          
        </div>

        <div class="map-responsive">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.562416181315!2d122.75250892363154!3d11.583194922978826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a5f2f02d18ae23%3A0x98e82c94732b4577!2sRoxas%20City%20Hall!5e0!3m2!1sen!2sph!4v1635031207740!5m2!1sen!2sph" width="1366" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
      </section>
  </main>


  <footer id="footer" class="footer" style="background-color: #012970;  margin-bottom: 0px;">
      
    <div class="copyright" style="color: white;">
      &copy; Copyright <strong><span>OBPPS</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="#">FCU Students</a>
    </div>
  </footer>

  <main class="main" id="main" style="background-color: #446091; margin-top: 0px;">
    <section class="section contact">

      <div class="row gy-4">

        <div class="col-xl-6">

          <div class="row">
            <div class="col-lg-6">
              <div class="info-box card" style="background-color: #446091; box-shadow: none; color: white;">
                <i class="bi bi-geo-alt" style="color: white;"></i>
                <h3 style="color: white;">Address</h3>
                <p>A108 Adam Street,<br>New York, NY 535022</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card" style="background-color: #446091; box-shadow: none; color: white;">
                <i class="bi bi-telephone" style="color: white;"></i>
                <h3 style="color: white;">Call Us</h3>
                <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card" style="background-color: #446091; box-shadow: none; color: white;">
                <i class="bi bi-envelope" style="color: white;"></i>
                <h3 style="color: white;">Email Us</h3>
                <p>info@example.com<br>contact@example.com</p>
              </div>
            </div>
            <div class="col-lg-6" >
              <div class="info-box card" style="background-color: #446091; box-shadow: none; color: white;">
                <i class="bi bi-clock" style="color: white;"></i>
                <h3 style="color: white;">Open Hours</h3>
                <p>Monday - Friday<br>9:00AM - 05:00PM</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-6">
          <div class="card p-4" style="margin-top: 10px;">
            <form action="forms/contact.php" method="post" class="php-email-form">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div>

        </div>

      </div>

    </section>
  </main>

   <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



  <?php 
    }
  }else{

   ?>
	<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
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

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <i class="bx bx-user-circle bx-md"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2">Account</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>User</h6>
              <span>Account</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-login.php">
                <i class="bx bx-log-in-circle"></i>
                <span>Login</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-register.php">
                <i class="bi bi-card-heading"></i>
                <span>Register</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
  </header>

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-house-door"></i>
          <span>Home Page</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bx-wrench"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="pages-login.php">
              <i class="bi bi-circle"></i><span>New Business Registration</span>
            </a>
          </li>
          <li>
            <a href="pages-login.php">
              <i class="bi bi-circle"></i><span>Renewal of Business</span>
            </a>
          </li>
          <li>
            <a href="pages-login.php">
              <i class="bi bi-circle"></i><span>My Businesses</span>
            </a>
          </li>
          <li>
            <a href="pages-requirements-list.php">
              <i class="bi bi-circle"></i><span>List of Requirements</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Services Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.php">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>
  </aside>
  <main id="main" class="main">
  	<div class="pagetitle">
      <h1>Welcome!</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Home Page</li>
          
        </ol>
      </nav>



    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Start: Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Online Business Permit Processing System</h5>

                <!-- Slides with captions -->
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="assets/img/slides-1.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="assets/img/slides-2.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="assets/img/slides-3.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="assets/img/slides-4.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="assets/img/slides-5.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        
                      </div>
                    </div>
                  </div>

                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>

                </div><!-- End Slides with captions -->

              </div>
            </div>


            

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Mission</h5>
                 The Online Business Permits Processing System of the City Government of Roxas City, Capiz exists to provide quality public service to the city’s process through the online system program which ensures efficient, fast and quality public service toward achieving a business-friendly environment.
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Vision</h5>
                 The Online Business Permits Processing System of Roxas City is the Model OBPPS in the entire roxas through its excellent implementation of the ONLINE system and other innovative programs that facilitate the conduct of legitimate private enterprise as a strategic means to enhance the city’s competitiveness as an investment destination.
              </div>
            </div><!-- End Default Card -->
            
          </div>
        </div><!-- End: Left side columns -->
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body" style="padding-top: 35px;">
             

              <nav class="d-flex justify-content-center">
                <ol class="breadcrumb">
                  <li ><img src="assets/img/OBPPSlogo-modified.png" style="width: 88px; height: 88px; margin: 1px;"></li>
                  <li ><img src="assets/img/ccs.png" style="width: 88px; height: 88px; margin: 1px;"></li>
                  <li ><img src="assets/img/cropped-HDlogo.png" style="width: 88px; height: 88px; margin: 1px;"></li>
                </ol>
              </nav>
            </div>
          </div>

          <div class="card info-card revenue-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title"><p>Registerd Businesses</p> <span>| This Month</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bx bxs-business"></i>
                </div>
                <?php
                
                 ?>
                <div class="ps-3">
                  <h6><?php echo $row['businesses']; ?></h6>
                  <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>
            </div>

          </div>
          <!-- Business Owners -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Business Owners</h5>

              <!-- Pie Chart -->
              <div id="pieChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#pieChart")).setOption({
                    
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      orient: 'vertical',
                      left: 'left'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: '50%',
                      data: [{
                          value: <?php echo $gender_row['male_cnt']; ?>,
                          name: 'male'
                        },
                        {
                          value: <?php echo $gender_row['female_cnt']; ?>,
                          name: 'Female'
                        },
                        {
                          value: <?php echo $gender_row['others_cnt']; ?>,
                          name: 'Others'
                        }
                      ],
                      emphasis: {
                        itemStyle: {
                          shadowBlur: 10,
                          shadowOffsetX: 0,
                          shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                      }
                    }]
                  });
                });
              </script>
              <!-- End Pie Chart -->

            </div>
          </div><!-- End Business Owners -->
          
        </div>
        
      </div>
    </section>
    <section>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center">City Government of Roxas City <br>FLOW CHART <br>Processing Business Permit</h5>
          <img src="assets/img/flowchart.png" style="width:100%;object-fit: cover;">
          
        </div>
        
      </div>

      <div class="map-responsive">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.562416181315!2d122.75250892363154!3d11.583194922978826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a5f2f02d18ae23%3A0x98e82c94732b4577!2sRoxas%20City%20Hall!5e0!3m2!1sen!2sph!4v1635031207740!5m2!1sen!2sph" width="1366" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    </section>
  </main>

   

  <footer id="footer" class="footer" style="background-color: #012970;  margin-bottom: 0px;">
      
    <div class="copyright" style="color: white;">
      &copy; Copyright <strong><span>OBPPS</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>

  <main class="main" id="main" style="background-color: #446091; margin-top: 0px;">
    <section class="section contact">
      <div class="row gy-4">

        <div class="col-xl-6">

          <div class="row">
            <div class="col-lg-6">
              <div class="info-box card" style="background-color: #446091; box-shadow: none; color: white;">
                <i class="bi bi-geo-alt" style="color: white;"></i>
                <h3 style="color: white;">Address</h3>
                <p>A108 Adam Street,<br>New York, NY 535022</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card" style="background-color: #446091; box-shadow: none; color: white;">
                <i class="bi bi-telephone" style="color: white;"></i>
                <h3 style="color: white;">Call Us</h3>
                <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card" style="background-color: #446091; box-shadow: none; color: white;">
                <i class="bi bi-envelope" style="color: white;"></i>
                <h3 style="color: white;">Email Us</h3>
                <p>info@example.com<br>contact@example.com</p>
              </div>
            </div>
            <div class="col-lg-6" >
              <div class="info-box card" style="background-color: #446091; box-shadow: none; color: white;">
                <i class="bi bi-clock" style="color: white;"></i>
                <h3 style="color: white;">Open Hours</h3>
                <p>Monday - Friday<br>9:00AM - 05:00PM</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-6">
          <div class="card p-4" style="margin-top: 10px;">
            <form action="forms/contact.php" method="post" class="php-email-form">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div>

        </div>

      </div>

    </section>
  </main>
   <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
   
 <?php }?>



  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/ve
  ndor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>