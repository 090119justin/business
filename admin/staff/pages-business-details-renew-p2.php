<?php $page='businesses'; $subpage='businessRenew'; include "../includes/staff-header.php"; ?>


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
            $businessId = $_GET['view_data2'];  
            $result = $conn->query("select business.id as businessId,address.*,personal_information.*, business.*
                from business.business
                inner join business.owner on business.ownerId = owner.id
                inner join business.personal_information on owner.infoId = personal_information.id
                inner join business.address on owner.addressId = address.id
                where business.id = $businessId;") or die($conn->error);
             $row = mysqli_fetch_assoc($result);
          ?>
   
        <!-- Recent Applicants -->
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Other Information<span> | Owner Address</span></h5>
                <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-11">
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">House/Bldg. No.</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['bldgNo']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Bldg. Name</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['bldgName']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Unit No.</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['unitNo']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Street</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['street']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Barangay</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['brgy']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Subdivision</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['subdivision']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">City/Municipality</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['municipality']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Province</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['province']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Telephone/Mobile No.</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['contactNo']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Email Address</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['email']); ?></div>
                    </div>

                    
                    <br>

                    <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-end">
                        <li class="page-item">
                          <a class="page-link" href="pages-applicants-review.php?view_data=<?php echo $row['businessId'] ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="pages-business-details-renew.php?view_data=<?php echo $row['businessId'] ?>">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="pages-business-details-renew-p3.php?view_data3=<?php echo $row['businessId'] ?>">3</a></li>
                        <li class="page-item"><a class="page-link" href="pages-business-details-renew-p4.php?view_data4=<?php echo $row['businessId'] ?>">4</a></li>
                        <li class="page-item"><a class="page-link" href="pages-business-details-renew-p5.php?view_data5=<?php echo $row['businessId'] ?>">5</a></li>
                        <li class="page-item"><a class="page-link" href="pages-business-details-renew-p6.php?view_data6=<?php echo $row['businessId'] ?>">6</a></li>
                        <li class="page-item">
                          <a class="page-link" href="pages-business-details-renew-p3.php?view_data3=<?php echo $row['businessId'] ?>" aria-label="Next">
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

<?php  include "../includes/staff-footer.php"; ?>
