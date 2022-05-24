
<?php $page='services'; $subpage='newBusiness'; include "includes/user-header.php"; 
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

  <main id="main" class="main">
    <div class="pagetitle" >
      <h1>Services</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">New Business Permit</li>

          
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
                <h5 class="card-title">NOTICE</h5>

                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                  <h4 class="alert-heading">Please pass your requirements before we proceed</h4>
                  <p>Submit the required documents in the Roxas City Hall(BPLO) and the administrator will verify your submitted documents.</p>
                  <hr>
                  <p id="requirements">See <a href="#requirements">List of Requirements </a> Below</p>
                </div>
                

              </div>
            </div>
            <div class="card" >
              <div class="card-body">
                <h5 class="card-title" >List of Requirements in securing your Business Permit</h5>
                

                <!-- List group Numbered -->
                <ol class="list-group list-group-numbered">
                  <li class="list-group-item">DTI Bus. Name Reg. (for single) /  SEC Reg. (for partnership/Corp.)</li>
                  <li class="list-group-item">Brgy. Clearance (for Business)</li>
                  <li class="list-group-item">Zoning Clearance (CPDO)</li>
                  <li class="list-group-item">Cert. of Annual Inspection (CEO)</li>
                  <li class="list-group-item">Fire Safty Inspection Cert. (BFP)</li>
                  <li class="list-group-item">Sanitary Permit (CHO)</li>
                  <li class="list-group-item">Contract of Lease (if space is rented)</li>
                  <li class="list-group-item">Sedula (Community Tax Cert.)</li>
                  <li class="list-group-item">Invested Capital</li>
                  <li class="list-group-item">Picture of Bus. Establishment</li>
                  <li class="list-group-item">Other Document/s necessary to support application depending on the nature of Business</li>
                  
                </ol><!-- End List group Numbered -->
                <form class="row g-3 needs-validation" style="padding-top: 20px;" method="POST" action="php/function-business-registration.php">              
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required style="margin-left: 5px; margin-right: 5px;">
                    <label class="form-check-label" for="invalidCheck">
                      I Have Submitted all Necessary Requirements
                    </label>
                    <div class="invalid-feedback" >
                      Please be sure to submit all requirements before proceeding
                    </div>
                  </div>
                  <div class="d-grid gap-2 mt-3">
                    <button class="btn btn-primary" name="requirements" type="submit">Proceed</button>
                  </div>
                </form>
                  

              </div>
            </div>
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
      <div class="map-responsive">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.562416181315!2d122.75250892363154!3d11.583194922978826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a5f2f02d18ae23%3A0x98e82c94732b4577!2sRoxas%20City%20Hall!5e0!3m2!1sen!2sph!4v1635031207740!5m2!1sen!2sph" width="1366" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </section>
  </main>

  

<?php include "includes/user-footer.php"; ?>
