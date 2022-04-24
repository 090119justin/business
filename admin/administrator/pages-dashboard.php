<?php $page='dashboard'; $subpage=''; include "../includes/admin-header.php"; ?>

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
    <?php       
      $result = $conn->query("select count(*) as total_businesses
        from business.business_mode
        inner join business.business on business_mode.businessId = business.id
        where mode = 'renew' or mode = 'new' and status = 'paid';") or die($conn->error);
      $row = mysqli_fetch_assoc($result);

      $applicants = $conn->query("select count(*) as total_applicants
              from business.business_mode
              inner join business.business on business_mode.businessId = business.id
              
              where status = 'pending';") or die($conn->error);
      $applicantRow = mysqli_fetch_assoc($applicants);

      $revenue = $conn->query("select sum(MayorsPermit) as total
              from business.regulatory_fees ") or die($conn->error);
      $revenueRow = mysqli_fetch_assoc($revenue);

      $renewal = $conn->query("SELECT date_format(applicationDate, '%M %Y') as month, COALESCE(count(business_mode.mode),0)as modes
          from business
          left outer join business_mode on business.id = business_mode.id and business_mode.mode = 'renew'
          group by month order by max(applicationDate)") or die($conn->error);

      while ($Renewalrow = mysqli_fetch_assoc($renewal)){
          $renewalArr[] = (int)$Renewalrow['modes'];
      }
      $renewalArr = json_encode($renewalArr);

      $monthvals = $conn->query("SELECT date_format(applicationDate, '%M %Y') as month, COALESCE(count(business_mode.mode),0)as modes
          from business
          left outer join business_mode on business.id = business_mode.id and business_mode.mode = 'renew'
          group by month order by max(applicationDate)") or die($conn->error);

      while ($monthRow = mysqli_fetch_assoc($monthvals)){
          $month[] = $monthRow['month'];
          
      }
      $month = json_encode($month);
      

      $new = $conn->query("SELECT date_format(applicationDate, '%M %Y') as month, COALESCE(count(business_mode.mode),0)as modes
          from business
          left outer join business_mode on business.id = business_mode.id and business_mode.mode = 'new'
          group by month order by max(applicationDate)") or die($conn->error);

      while ($newRow = mysqli_fetch_assoc($new)){
          $newArr[] = (int)$newRow['modes'];
          
      }
      $newArr = json_encode($newArr);

      $retirement = $conn->query("SELECT date_format(applicationDate, '%M %Y') as month, COALESCE(count(business_mode.mode),0)as modes
          from business
          left outer join business_mode on business.id = business_mode.id and business_mode.mode like '%retire%'
          group by month order by max(applicationDate)") or die($conn->error);

      while ($retireRow = mysqli_fetch_assoc($retirement)){
          $retireArr[] = (int)$retireRow['modes'];
          
      }
      $retireArr = json_encode($retireArr);
      
      
      

    ?>

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
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
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                    <li><a class="dropdown-item" href="#">All Time</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Revenue</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi ">₱</i>
                    </div>
                    <div class="ps-3">
                      <h6>₱ <?php echo number_format($revenueRow['total']); ?></h6>
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

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
                  <h5 class="card-title">Business Registered <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $row['total_businesses']; ?></h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

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
                  <h5 class="card-title">Reports <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>

                    var newData = JSON.parse('<?php echo $newArr?>');
                    var renewalData = JSON.parse('<?php echo $renewalArr?>');
                    var retirementData = JSON.parse('<?php echo $retireArr?>');
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'New',
                          data: newData
                        }, {
                          name: 'Renewal',
                          data: renewalData
                        }, {
                          name: 'Retirement',
                          data: retirementData
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'string',
                          categories: JSON.parse('<?php echo $month?>')
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales">

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
                  <?php       
                      $result = $conn->query("select business.id, concat('#',lpad(business.id,4,'0')) as newId ,concat(firstName,' ',lastName) as name, businessName, status
                        from business.business
                        inner join business.owner on business.ownerId = owner.id
                        inner join business.personal_information on owner.infoId = personal_information.id
                        where status != 'renewed'") or die($conn->error);
                    ?>

                  <h5 class="card-title">Businesses</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Owner</th>
                        <th scope="col">Business Name</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <?php
                    while ($row = $result->fetch_assoc()): ?>
                      <tr>
                        <th scope="row"><a href="#"><?php echo $row['newId'];?></a></th>
                        <td><?php echo $row['name'];?></td>
                        <td class="text-primary" ><?php echo $row['businessName'];?></td>
                        <td>
                          
                            <?php 
                              if($row['status'] == 'unpaid'){
                             ?>
                            <a class="badge bg-warning text-dark"> Unpaid</a>
                          <?php }else if($row['status'] == 'paid') {?>
                            <a class="badge bg-success text-light" style="width: 52px;">Paid</a>
                          
                          <?php }else if($row['status'] == 'retired') {?>
                            <a class="badge bg-danger text-light"> Retired </a>
                          <?php } ?>
                        </td>
                      </tr>
                    <?php endwhile; ?>
                    </thead>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
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
              <h5 class="card-title">Recent Activity <span>| Today</span></h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                   Newly Registered
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    Retirement
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    Renewal
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                  <div class="activity-content">
                   pending
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                   Payments status
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    Applicants
                  </div>
                </div><!-- End activity item-->

              </div>

            </div>
          </div><!-- End Recent Activity -->

          <!-- Budget Report -->
          <div class="card">
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

            <div class="card-body pb-0">
              <h5 class="card-title">Reports <span>| This Month</span></h5>

              <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

              <script>
                console.log(JSON.parse('<?php echo $renewalArr?>'));

                console.log(JSON.parse('<?php echo $month?>'));
                document.addEventListener("DOMContentLoaded", () => {
                  var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                    legend: {
                      data: ['New', 'Renewal']
                    },
                    radar: {
                      // shape: 'circle',
                      indicator: [{
                          name: '',
                          max: 6500
                        },
                        {
                          name: '',
                          max: 16000
                        },
                        {
                          name: '',
                          max: 30000
                        },
                        {
                          name: '',
                          max: 38000
                        },
                        {
                          name: '',
                          max: 52000
                        },
                        {
                          name: '',
                          max: 25000
                        }
                      ]
                    },
                    series: [{
                      name: 'Budget vs spending',
                      type: 'radar',
                      data: [{
                          value: [4200, 3000, 20000, 35000, 50000, 18000],
                          name: 'New'
                        },
                        {
                          value: [5000, 14000, 28000, 26000, 42000, 21000],
                          name: 'Renewal'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Budget Report -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

<?php include "../includes/admin-footer.php"; ?>