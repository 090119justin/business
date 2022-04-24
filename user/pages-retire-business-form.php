<?php $page='services'; $subpage='retireBusiness'; include "includes/user-header.php"; ?>


  <main id="main" class="main">
    <div class="pagetitle" >
      <h1>Retirement Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Services</a></li>
          <li class="breadcrumb-item">Retirement of business</li>
          
        </ol>
      </nav>
     


      <?php require_once "php/function-business-registration.php" ?>

    </div><!-- End Page Title -->

    <section class="section profile">
      <?php
          $businessId = $_GET['business'];
          $business = $conn->query("select business.id as businessId,address.*, business.*
                from business.business
                inner join business.address on business.addressId = address.id
                where business.id = $businessId;") or die($conn->error);
          $businessRow = mysqli_fetch_assoc($business);

          $taxPayer = $conn->query("select business.id as businessId,address.*, InfoId, owner.addressId, personal_information.*
                from business.business
                inner join business.owner on business.ownerId = owner.id
                inner join business.personal_information on owner.infoId = personal_information.id
                inner join business.address on owner.addressId = address.id
                where business.id = $businessId;") or die($conn->error);
          $row = mysqli_fetch_assoc($taxPayer);

          $lineOfBusQuery =  $conn->query("select activity.lineOfBusiness as line, business.applicationDate as date
                from activity
                inner join business on activity.businessId = business.id
                where business.id = $businessId") or die($conn->error);
         
       ?>
      <form class="row g-3" action="php/function-business-retirement.php" method="POST">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              



              <input type="hidden" name="businessId" value="<?php echo $businessId ?>">
              <center>
                <h3 class = "card-title" style="font-size: 25px;">APPLICATION FORM FOR BUSINESS RETIREMENT</h3>
              </center>
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="label ">Control No.: </div>
                        <div>123</div>
                      </div>
                      <div class="col-lg-4">
                        <div class="label ">Application Date: </div>
                        <div><?php echo date('M d, Y',strtotime(date('Y-m-d'))); ?></div>
                      </div>
                      <div class="col-lg-4">
                        <div class="label ">Effective Date: </div>
                        <div><?php echo date('M d, Y',strtotime(date('Y-m-d'). ' + 7 days')); ?></div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="label ">Business Name: </div>
                        <div><?php echo ucwords($businessRow['businessName']); ?></div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="label ">Business Account No: </div>
                        <div><?php echo ucwords($row['InfoId']); ?></div>
                      </div>
                      <div class="col-lg-6">
                        <div class="label ">Permit No: </div>
                        <div><?php echo ucwords($row['InfoId']); ?></div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="label ">Business Address: </div>
                        <div><?php echo ucwords($businessRow['municipality']).', '.ucwords($businessRow['province']); ?></div>
                      </div>
                      <div class="col-lg-6">
                        <div class="label ">Barangay: </div>
                        <div><?php echo ucwords($businessRow['brgy']); ?></div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="label ">Name of Taxpayer: </div>
                        <div class="col-lg-9 col-md-8"><?php echo ucwords($row['firstName']).' '.ucwords($row['middleName'][0]).'. '.ucwords($row['lastName']); ?></div>
                      </div>
                      <div class="col-lg-6">
                        <div class="label ">Tel. No./Mobile No.: </div>
                        <div><?php echo ucwords($row['contactNo']); ?></div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="label ">Address of Taxpayer: </div>
                        <div><?php echo ucwords($row['municipality']).', '.ucwords($row['province']); ?></div>
                      </div>
                      <div class="col-lg-6">
                        <div class="label ">Email Address: </div>
                        <div><?php echo ucwords($row['email']); ?></div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-lg-6"></div>
                      <div class="label col-lg-6">Gross Sales/Receipts:</div>
                      <table class="table table-borderless datatable">
                        <thead>
                          <tr>
                            <th scope="col">Line of Business</th>
                            <th scope="col">Preceding Year</th>
                            <th scope="col">Current Year</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php  while ($rows = $lineOfBusQuery->fetch_assoc()):
                            if($rows['line'] != null){?>
                          <tr>
                            <td><?php echo $rows['line']; ?></td>
                            <td><?php echo date('Y',strtotime($rows['date'])); ?></td>
                            <td><?php echo date("Y"); ?></td>
                          </tr>
                        <?php }endwhile; ?>
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>
              </div>

              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <p>Submitted herewith for cancellation together with the above Business Permit are the following Official's Receipt/s covering payment/s of business taxes and fees for the current year</p>
              </div>
              <div>
                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">O.R. No.</th>
                      <th scope="col">Date</th>
                      <th scope="col">Amount Paid (in PHP)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Sept. 21, 2021</td>
                      <td>3,000</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
                
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">IMPORTANT NOTE: </h4>
                <p>The mere filling of these application does not automatically relieve the applicant from any tax liability. In order to facilitate the processing of business retirement, He/She shall submit to this office pertinent documents relative thereto. This is persuant to Section 19.00 of The Revenue Code of Roxas City</p>
              </div>
              
              <br>
              <h5 style="font-weight: bold;">REQUIREMENTS/DOCUMENTS SUBMITTED</h5>              
            
              <div style="margin-top: 15px;">

                <ol class="list-group list-group-numbered">
                  <li class="list-group-item">Affidavit of closure (for single proprietor) or Board Resolution Authorizing Closure (for Corporation)</li>
                  
                  <li class="list-group-item">Original Mayor's Permit</li>
                  <li class="list-group-item">Original Receipt/Business Tax Paid</li>
                  <li class="list-group-item">Business Plate</li>
                  <li class="list-group-item">Certification of Gross Sales</li>
                  <li class="list-group-item">Audited Financial Statement</li>
                  <li class="list-group-item">BIR Payment/Vat Returns (Monthly/Quarterly/Annual)</li>
                  <li class="list-group-item">Certification of Closure (Form Lessor/Mall/Building Admin.)</li>
                  <li class="list-group-item">Other Requirements Depending on the Nauture of Business</li>
                 

                  
                </ol>
                
              </div>
              <div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                <p>*BPLO reserves the right to ask for additional documents whenever necessary.</p>
              </div>
              <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-primary" name="retire">Submit</button>
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-1"></div>
        
      </form>
    </section>
  </main>

  

  <?php include "includes/user-footer.php"; ?>
