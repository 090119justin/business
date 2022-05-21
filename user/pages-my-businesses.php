<?php $page='services'; $subpage='myBusinesses'; include "includes/user-header.php"; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Services</h1>
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
            $infoId = $_SESSION['personId'];
            $result = $conn->query("select business.*, business.id as businessId, mode
                       from business.business_mode
                       inner join business.business on business_mode.businessId = business.id
                       INNER JOIN business.owner on business.ownerId = owner.id
                       inner join business.personal_information on owner.infoId = personal_information.id
                       where infoId = $infoId;") or die($conn->error);
           
          ?>
        
   
        <!-- Recent Applicants -->
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">My Businesses</h5>
                <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-10">
                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          <th scope="col">#</th>

                          <th scope="col">Business Name</th>
                          <th scope="col">President</th>
                          <th scope="col">Mode</th>
                          <th scope="col">Status</th>
                          <th scope="col">Details</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()): ?>
                          <tr>
                            <th scope="row"><?php echo $row['businessId'];?></td>
                            <td scope="row"><?php echo $row['businessName'];?></td>
                            <td scope="row"><?php echo $row['presidentLname'];?></td>
                            <td scope="row"><?php echo $row['mode'];?></td>
                            <td scope="row"><?php echo $row['status'];?></td>
                            <td scope="row">
                              <a class="badge bg-primary text-light" href="pages-business-details.php?view_data=<?php echo $row ['businessId']; ?>">
                                <i class="bi bi-eye-fill" ></i> Business 
                              </a>
                              
                              <a class="badge bg-success text-light" href="pages-view-payments.php?view_data=<?php echo $row ['businessId']; ?>">
                                <i class="bi bi-eye-fill" ></i> Payment
                              </a>
                            </td>
                            
                          </tr>
                      <?php endwhile; ?>
                        
                        
                        
                      </tbody>
                    </table>

                    

                    
                    <br>


                  </div>
                  <div class="col-lg-1"></div>
                </div>

                    


                    
              </div>
            </div>
            
          </div>
        </div>
          
      </div> 
    </section>

      <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal Dialog Scrollable</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="card">
              <div class="card-body">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Payment<span> | Details
                  </span></h5>

                  <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-11">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Regulatory Fees</th>
                            <th scope="col">Amount Due</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          
                          <tr>
                            <td>Mayor's Permit</td>
                            <td>550</td>                   
                          </tr>
                          <tr>
                            <td>Garbage Charges</td>
                            <td>1,500</td>                   
                          </tr>
                          <tr>
                            <td>Delivery Trucks/Vans Permit Fee</td>
                            <td>550</td>                   
                          </tr>
                          <tr>
                            <td>Sanitary Inspection Fee</td>
                            <td>500</td>                                                              
                          </tr>
                          <tr>
                            <td>Building Inspection Fee</td>
                            <td>550</td>                                                               
                          </tr>
                          <tr>
                            <td>Electrical Inspection Fee</td>
                            <td>550</td>            
                          </tr>
                          <tr>
                            <td>Mechanical Inspection Fee</td>
                            <td>550</td>                                                          
                          </tr>
                          <tr>
                            <td>Plumbing Inspection Fee</td>
                            <td>550</td>                                                             
                          </tr>
                          <tr>
                            <td>Storage and Sale of Combustible/Flamable or Explosive Substance</td>
                            <td>550</td>                                                               
                          </tr>
                          <tr>
                            <td>Others</td>
                            <td>0</td>                   
                          </tr>
                          <tr>
                            <th>Total Fees For LGU</th>
                            <th>5,900</th>                   
                          </tr> 
                          <tr>
                            <th>Fire Safety Inspection Fee (10%)</th>
                            <th>590</th>                   
                          </tr>
                          <tr>
                            <th>TOTAL</th>
                            <th>6,490</th>                   
                          </tr>                      
                        </tbody>
                      </table>

                      
                      <br>

                     

                  </div>



                </div>
              </div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div><!-- End Modal Dialog Scrollable-->

  </main><!-- End #main -->

<?php include "includes/user-footer.php"; ?>
