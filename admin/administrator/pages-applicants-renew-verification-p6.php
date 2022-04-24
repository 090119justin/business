<?php $page='applicants'; $subpage='applicantsRenew'; include "../includes/admin-header.php"; ?>


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
      <form method="POST" action="../php/admin-function-verify.php">
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
                            <td>₱ <input id='mayor' type="number" name="mayor"  placeholder=0 onchange='calculate()' onkeyup='calculate()' required/></td>                   
                          </tr>
                          <tr>
                            <td>Garbage Charges</td>
                            <td>₱ <input id='garbage' type="number" name="garbage" placeholder=0 onchange='calculate()' onkeyup='calculate()' required/></td>                   
                          </tr>
                          <tr>
                            <td>Delivery Trucks/Vans Permit Fee</td>
                            <td>₱ <input id='trucks' type="number" name="trucks" placeholder=0 onchange='calculate()' onkeyup='calculate()' required/></td>                   
                          </tr>
                          <tr>
                            <td>Sanitary Inspection Fee</td>
                            <td>₱ <input id='sanitary' type="number" name="sanitary" placeholder=0 onchange='calculate()' onkeyup='calculate()' required/></td>                                                              
                          </tr>
                          <tr>
                            <td>Building Inspection Fee</td>
                            <td>₱ <input id='building' type="number" name="building" placeholder=0 onchange='calculate()' onkeyup='calculate()' required/></td>                                                               
                          </tr>
                          <tr>
                            <td>Electrical Inspection Fee</td>
                            <td>₱ <input id='electrical' type="number" name="electrical" placeholder=0 onchange='calculate()' onkeyup='calculate()' required/></td>            
                          </tr>
                          <tr>
                            <td>Mechanical Inspection Fee</td>
                            <td>₱ <input id='mechanical' type="number" name="mechanical" placeholder=0 onchange='calculate()' onkeyup='calculate()' required/></td>                                                          
                          </tr>
                          <tr>
                            <td>Plumbing Inspection Fee</td>
                            <td>₱ <input id='plumbing' type="number" name="plumbing" placeholder=0 onchange='calculate()' onkeyup='calculate()' required/></td>                                                             
                          </tr>
                          <tr>
                            <td>Storage and Sale of Combustible/Flamable or Explosive Substance</td>
                            <td>₱ <input id='storage' type="number" name="storage" placeholder=0 onchange='calculate()' onkeyup='calculate()' required/></td>                                                               
                          </tr>
                          <tr>
                            <td>Others</td>
                            <td>₱ <input id='others' type="number" name="others"  placeholder=0 onchange='calculate()' onkeyup='calculate()' required/></td>                   
                          </tr>
                          <tr>
                            <th>Total Fees For LGU</th>
                            <th id='total_lgu'><input id='total_lgu' type="hidden" name="total_lgu" placeholder=0/></th>                   
                          </tr> 
                          <tr>
                            <th>Fire Safety Inspection Fee (10%)</th>
                            <th id="firesafety"><input id='firesafety' type="hidden" name="firesafety" placeholder=0/></th>       
                          </tr>
                          <tr>
                            <th>TOTAL</th>
                            <th id="total" ><input id='total' type="hidden" name="total" placeholder=0/></th>                   
                          </tr>                     
                        </tbody>
                      </table>

                      <input type="hidden" id="firesafety1" name="firesafety">
                      
                      <br>

                      <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                          <li class="page-item">
                            <a class="page-link" href="pages-applicants-review-p2.php?view_data2=<?php echo $row['businessId'] ?>" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                            </a>
                          </li>
                          <li class="page-item"><a class="page-link" href="pages-applicants-renew-verification.php?view_data=<?php echo $row['businessId'] ?>">1</a></li>
                          <li class="page-item"><a class="page-link" href="pages-applicants-renew-verification-p2.php?view_data2=<?php echo $row['businessId'] ?>">2</a></li>
                          <li class="page-item"><a class="page-link" href="pages-applicants-renew-verification-p3.php?view_data3=<?php echo $row['businessId'] ?>">3</a></li>                        
                          <li class="page-item"><a class="page-link" href="pages-applicants-renew-verification-p4.php?view_data4=<?php echo $row['businessId'] ?>">4</a></li>
                          <li class="page-item"><a class="page-link" href="pages-applicants-renew-verification-p5.php?view_data5=<?php echo $row['businessId'] ?>">5</a></li>
                          <li class="page-item active"><a class="page-link" href="#">6</a></li>
                        </ul>
                      </nav>

                      

                    </div>
                    
                    <div class="d-grid gap-2 mt-3">
                      <button class="btn btn-success" type="submit" name="renew">SUBMIT</button>
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
