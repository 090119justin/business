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
      

        <?php
            $businessId = $_GET['view_data6'];  
            $result = $conn->query("select business.id as businessId,address.*, business.*
                from business.business
                inner join business.address on business.addressId = address.id
                where business.id = $businessId;") or die($conn->error);
             $row = mysqli_fetch_assoc($result);
          ?>
      <form method="POST" action="php/admin-function-verify.php">
        <input type="hidden" name="businessId" value="<?php echo $_GET['view_data6']?>">
        <div>
          <!-- Recent Applicants -->
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">LGU Section<span> | Verification of Documents
                  </span></h5>
                  <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-11">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Description</th>
                            <th scope="col">Office/Agency</th>
                            <th scope="col">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          
                          <tr>
                            <td>Brgy. Clearance (for Business)</td>
                            <td>Barangay</td>
                            <td>
                              <select name="BrgyClearance" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                                <option value="not needed">Not Needed</option>
                              </select>
                            </td>
                            
                          </tr>
                          <tr>
                            <td>Zoning Clearance</td>
                            <td>Zoning Section - City Planning Office</td>
                            <td>
                             <select name="ZoningClearance" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                                <option value="not needed">Not Needed</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>Occupancy Permit</td>
                            <td>Bldg. Official - City Engr's Office</td>
                            <td>
                              <select name="OccupancyPermit" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                                <option value="not needed">Not Needed</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>Cert. of Annual Inspection</td>
                            <td>City Engineer's Office</td>
                            <td>
                              <select name="AnnualInspection" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                                <option value="not needed">Not Needed</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>Sanitary Permit / Health Clearance</td>
                            <td>City Health Office</td>
                            <td>
                              <select name="SanitaryPermit" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                                <option value="not needed">Not Needed</option>
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td>Fire Safety Inspection Cert.</td>
                            <td>Bureau of Fire Protection</td>
                            <td>
                              <select name="FireCertificate" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                                <option value="not needed">Not Needed</option>
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td>City Environmental Certificate</td>
                            <td>Dept. of Environment and Natural Resources</td>
                            <td>
                              <select name="EnvironmentCertificate" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                                <option value="not needed">Not Needed</option>
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td>Market Clearance (for Stall Holders)</td>
                            <td>Office of the City Market Administrator</td>
                            <td>
                              <select name="MarketClearance" class="form-select" id="floatingSelect" aria-label="Floating label select example" required="">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                                <option value="not needed">Not Needed</option>
                              </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="card">
              <div class="card-body">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">LGU Section<span> | Assessment of Applicable Fees
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

                      <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                          <li class="page-item">
                            <a class="page-link" href="pages-applicants-review-p2.php?view_data2=<?php echo $row['businessId'] ?>" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                            </a>
                          </li>
                          <li class="page-item"><a class="page-link" href="pages-business-details.php?view_data=<?php echo $row['businessId'] ?>">1</a></li>
                          <li class="page-item"><a class="page-link" href="pages-business-details-p2.php?view_data2=<?php echo $row['businessId'] ?>">2</a></li>
                          <li class="page-item"><a class="page-link" href="pages-business-details-p3.php?view_data3=<?php echo $row['businessId'] ?>">3</a></li>                        
                          <li class="page-item"><a class="page-link" href="pages-business-details-p4.php?view_data4=<?php echo $row['businessId'] ?>">4</a></li>
                          <li class="page-item"><a class="page-link" href="pages-business-details-p5.php?view_data5=<?php echo $row['businessId'] ?>">5</a></li>
                          <li class="page-item active"><a class="page-link" href="#">6</a></li>
                        </ul>
                      </nav>

                      

                    </div>
                    
                    <div class="d-grid gap-2 mt-3">
                      <a class="btn btn-success" href="pages-dashboard.php">Back to Dashboard</a>
                    </div>

                  </div>



                </div>
              </div>
            </div>

          </div>
            
        </div>
      </form>
    </section>

  </main><!-- End #main -->

<?php include "../includes/admin-footer.php"; ?>
