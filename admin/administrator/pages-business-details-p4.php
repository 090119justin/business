<?php $page='businesses'; $subpage='businessNew'; include "../includes/admin-header.php"; ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Applicants</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="pages-applicants-new.php">New</a></li>
          <li class="breadcrumb-item active">Review</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">

        <?php
            $businessId = $_GET['view_data4'];  
            $result = $conn->query("select business.id as bid ,lessor.*, business.*
                    from business.business
                    left join business.lessor on business.id = lessor.businessId
                    where business.id = $businessId;") or die($conn->error);
             $row = mysqli_fetch_assoc($result);
          ?>
   
        <!-- Recent Applicants -->
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Other Information</h5>
                <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-11">
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Male Employee(s)</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['maleEmployees']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">FeMale Employee(s)</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['femaleEmployees']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Total Employee(s)</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['maleEmployees'] + $row['femaleEmployees']; ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">No. of Employees Residing in LGU</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['employeesLGU']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Lessor's Full Name</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['fullName']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Lessor's Full Address</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['fullAddress']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Lessor's Telephone/Mobile No.</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['contactNo']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Lessor's Email</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['email']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Monthly Rental.</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['monthly']); ?></div>
                    </div>

                    

                    
                    <br>

                    <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-end">
                        <li class="page-item">
                          <a class="page-link" href="pages-applicants-review-p3.php?view_data3=<?php echo $row['bid'] ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="pages-business-details.php?view_data=<?php echo $row['bid'] ?>">1</a></li>
                        <li class="page-item"><a class="page-link" href="pages-business-details-p2.php?view_data2=<?php echo $row['bid'] ?>">2</a></li>
                        <li class="page-item"><a class="page-link" href="pages-business-details-p3.php?view_data3=<?php echo $row['bid'] ?>">3</a></li>
                        <li class="page-item active"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="pages-business-details-p5.php?view_data5=<?php echo $row['bid'] ?>">5</a></li>
                        <li class="page-item"><a class="page-link" href="pages-business-details-p6.php?view_data6=<?php echo $row['businessId'] ?>">6</a></li>
                        <li class="page-item">
                          <a class="page-link" href="pages-business-details-p5.php?view_data5=<?php echo $row['bid'] ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                          </a>
                        </li>
                      </ul>
                    </nav>

                  </div>
                </div>

                    


                    
              </div>
            </div>
            
          </div>
        </div>
          
      </div> 
    </section>

  </main><!-- End #main -->

<?php include "../includes/admin-footer.php"; ?>
