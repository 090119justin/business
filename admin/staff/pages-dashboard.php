<?php $page='dashboard'; $subpage=''; include "../includes/staff-header.php"; 
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

  $applicants = $conn->query("select count(*) as total_applicants
          from business.business_mode
          inner join business.business on business_mode.businessId = business.id
          
          where status = 'pending';") or die($conn->error);
  $applicantRow = mysqli_fetch_assoc($applicants);
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Start: Left side columns -->
        <div class="col-lg-8">
          <div class="row">
            <div class="card info-card sales-card">

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
                <h5 class="card-title">Applicants</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="ri-user-2-line"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?php echo $applicantRow['total_applicants'] ?></h6>
                  </div>
                </div>
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
                <h5 class="card-title"><p>Registered Businesses</p> <span>| This Month</span></h5>

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

  </main><!-- End #main -->

<?php include "../includes/staff-footer.php"; ?>