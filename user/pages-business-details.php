<?php $page='services'; $subpage='myBusinesses'; include "includes/user-header.php"; ?>

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
            $businessId = $_GET['view_data'];  
            $result = $conn->query("select business.id as businessId,personal_information.*, business.*
                from business.business
                inner join business.owner on business.ownerId = owner.id
                inner join business.personal_information on owner.infoId = personal_information.id
                where business.id = $businessId;") or die($conn->error);
             $row = mysqli_fetch_assoc($result);
          ?>
   
        <!-- Recent Applicants -->
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Basic Information</h5>
                <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-11">
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Applicant Name</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['firstName']).' '.ucwords($row['middleName']).' '.ucwords($row['lastName']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Business Name</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['businessName']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Trade Name/Franchise</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['tradeName']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Tax Year</div>
                      <div class="col-lg-9 col-md-8"><?php echo substr($row['taxYear'],0,strpos($row['taxYear'], '-')); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">City/Municipality</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['officeMunicipality']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Mode of Payment</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['paymentMode']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Date of Application</div>
                      <div class="col-lg-9 col-md-8"><?php echo date('M d, Y',strtotime($row['applicationDate'])); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Tin No.</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['tinNumber']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">DTI/SEC/CDA Reg. No.</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['DTIRegNo']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">DTI/SEC/CDA Date of Reg.</div>
                      <div class="col-lg-9 col-md-8"><?php echo date('M d, Y',strtotime($row['DTIRegDate'])); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Type of Business</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['type']); ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">President Name</div>
                      <div class="col-lg-9 col-md-8"><?php echo ucwords($row['presidentFname'])." ".ucwords($row['presidentMname'])." ".ucwords($row['presidentLname']); ?></div>
                    </div>

                    <br>

                    <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-end">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="pages-business-details-p2.php?view_data2=<?php echo $row['businessId'] ?>">2</a></li>
                        <li class="page-item"><a class="page-link" href="pages-business-details-p3.php?view_data3=<?php echo $row['businessId'] ?>">3</a></li>
                        <li class="page-item"><a class="page-link" href="pages-business-details-p4.php?view_data4=<?php echo $row['businessId'] ?>">4</a></li>
                        <li class="page-item"><a class="page-link" href="pages-business-details-p5.php?view_data5=<?php echo $row['businessId'] ?>">5</a></li>
                        
                        <li class="page-item">
                          <a class="page-link" href="pages-business-details-p2.php?view_data2=<?php echo $row['businessId'] ?>" aria-label="Next">
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

<?php include "includes/user-footer.php"; ?>
  