<?php $page='businesses'; $subpage='businessRenew'; include "../includes/admin-header.php"; ?>


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
            
            $result = $conn->query("select *
                      from business.regulatory_fees
                      where businessId = $businessId;") or die($conn->error);
            $row = mysqli_fetch_assoc($result);

            $businessResult = $conn->query("select *
                from business.business
                where id = $businessId;") or die($conn->error);

            $businessRow = mysqli_fetch_assoc($businessResult);
            $businessName = $businessRow["businessName"];

            $pastBusiness = $conn->query("SELECT * FROM `business` WHERE businessName = '$businessName' and id != $businessId
            ORDER by id DESC
            LIMIT 1;") or die($conn->error);
            $pastBusinessRow = mysqli_fetch_assoc($pastBusiness);


            $pastPayment = strval($pastBusinessRow["applicationDate"]);
            $pastPayment = strtotime($pastPayment);
            $currentDate = strval(date("Y-m-d"));
            $currentDate = strtotime($currentDate);

            $pastYear = date('Y', $pastPayment);
            $currentYear = date('Y', $currentDate);

            $pastMonth = date('m', $pastPayment);
            $currentMonth = date('m', $currentDate);

            $diff = (($currentYear - $pastYear) * 12) + ($currentMonth - $pastMonth);

            $paymentMode = $pastBusinessRow["paymentMode"];

            $penalty = 0;
            $initialPenalty = 0;
            $remainingPenalty = 0;
            if($paymentMode == "Annually"){
                if($diff > 12){
                $penalty = $diff - 12;
                $initialPenalty = 0.06;
                $remainingPenalty = $penalty - 1;
                
                }
                
            }
            else if($paymentMode == "Quarterly"){
                if($diff > 4 ){
                $penalty = $diff - 4;
                $initialPenalty = 0.06;
                $remainingPenalty = $penalty - 1;
                }
                
            }
            else if($paymentMode == "Semi-Anually"){
                if($diff > 6 ){
                $penalty = $diff - 6;
                $initialPenalty = 0.06;
                $remainingPenalty = $penalty - 1;
                }
                
            }

            $total = $row['MayorsPermit'] + $row['GarbageCharges'] + $row['DeliveryTrucks'] + $row['SanitaryInspection'] + $row['BldgInspection'] + $row['ElectricalInspection'] + $row['MechanicalInspection'] + $row['PlumbingInspection'] + $row['SubstanceStorage'] + $row['Others'];
            
            
            $MayorPenalty = ($row['MayorsPermit'] * $initialPenalty) + (($row['MayorsPermit'] * 0.02) * $remainingPenalty);
            $GarbageChargesPenalty = ($row['GarbageCharges'] * $initialPenalty) + (($row['GarbageCharges'] * 0.02) * $remainingPenalty);
            $DeliveryTrucksPenalty = ($row['DeliveryTrucks'] * $initialPenalty) + (($row['DeliveryTrucks'] * 0.02) * $remainingPenalty);
            $SanitaryInspectionPenalty = ($row['SanitaryInspection'] * $initialPenalty) + (($row['SanitaryInspection'] * 0.02) * $remainingPenalty);
            $BldgInspectionPenalty = ($row['BldgInspection'] * $initialPenalty) + (($row['BldgInspection'] * 0.02) * $remainingPenalty);
            $ElectricalInspectionPenalty = ($row['ElectricalInspection'] * $initialPenalty) + (($row['ElectricalInspection'] * 0.02) * $remainingPenalty);
            $MechanicalInspectionPenalty = ($row['MechanicalInspection'] * $initialPenalty) + (($row['MechanicalInspection'] * 0.02) * $remainingPenalty);
            $PlumbingInspectionPenalty = ($row['PlumbingInspection'] * $initialPenalty) + (($row['PlumbingInspection'] * 0.02) * $remainingPenalty);
            $SubstanceStoragePenalty = ($row['SubstanceStorage'] * $initialPenalty) + (($row['SubstanceStorage'] * 0.02) * $remainingPenalty);
            $OthersPenalty = ($row['Others'] * $initialPenalty) + (($row['Others'] * 0.02) * $remainingPenalty);

            $total = $total + $MayorPenalty +  $GarbageChargesPenalty + $DeliveryTrucksPenalty + $SanitaryInspectionPenalty + $BldgInspectionPenalty + $ElectricalInspectionPenalty + $MechanicalInspectionPenalty + $PlumbingInspectionPenalty + $SubstanceStoragePenalty + $OthersPenalty;
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
                                    <th scope="col">Local Taxes & Regulatory Fees</th>
                                    <th scope="col">Amount Due</th>
                                    <th scope="col">Penalty/Surcharge</th>
                                    <th scope="col">Total</th>
                        
                                </tr>
                            </thead>
                            <tbody>
                    
                                <tr>
                                    <td>Mayor's Permit</td>
                                    <td><?php echo number_format($row['MayorsPermit']);?></td>
                                    <td><?php echo number_format($MayorPenalty);?></td>                  
                                    <td><?php echo number_format($MayorPenalty + $row['MayorsPermit']);?></td>              
                                </tr>
                                <tr>
                                    <td>Garbage Charges</td>
                                    <td><?php echo number_format($row['GarbageCharges']);?></td>
                                    <td><?php echo number_format($GarbageChargesPenalty);?></td>                  
                                    <td><?php echo number_format($GarbageChargesPenalty + $row['GarbageCharges']); ?></td>                    
                                </tr>
                                <tr>
                                    <td>Delivery Trucks/Vans Permit Fee</td>
                                    <td><?php echo number_format($row['DeliveryTrucks']);?></td>
                                    <td><?php echo number_format($DeliveryTrucksPenalty );?></td>                  
                                    <td><?php echo number_format($DeliveryTrucksPenalty + $row['DeliveryTrucks']);?></td>                    
                                </tr>
                                <tr>
                                    <td>Sanitary Inspection Fee</td>
                                    <td><?php echo number_format($row['SanitaryInspection']);?></td>
                                    <td><?php echo number_format($SanitaryInspectionPenalty);?></td>                  
                                    <td><?php echo number_format($SanitaryInspectionPenalty + $row['SanitaryInspection']);?></td>                                                               
                                </tr>
                                <tr>
                                    <td>Building Inspection Fee</td>
                                    <td><?php echo number_format($row['BldgInspection']);?></td>
                                    <td><?php echo number_format($BldgInspectionPenalty);?></td>                  
                                    <td><?php echo number_format($BldgInspectionPenalty + $row['BldgInspection']);?></td>                                                               
                                </tr>
                                <tr>
                                    <td>Electrical Inspection Fee</td>
                                    <td><?php echo number_format($row['ElectricalInspection']);?></td>
                                    <td><?php echo number_format($ElectricalInspectionPenalty);?></td>                  
                                    <td><?php echo number_format($ElectricalInspectionPenalty + $row['ElectricalInspection']);?></td>                                                               
                                </tr>
                                <tr>
                                    <td>Mechanical Inspection Fee</td>
                                    <td><?php echo number_format($row['MechanicalInspection']);?></td> 
                                    <td><?php echo number_format($MechanicalInspectionPenalty);?></td>                  
                                    <td><?php echo number_format($MechanicalInspectionPenalty + $row['MechanicalInspection']);?></td>                                                               
                                </tr>
                                <tr>
                                    <td>Plumbing Inspection Fee</td>
                                    <td><?php echo number_format($row['PlumbingInspection']);?></td>  
                                    <td><?php echo number_format($PlumbingInspectionPenalty);?></td>                  
                                    <td><?php echo number_format($PlumbingInspectionPenalty + $row['PlumbingInspection']);?></td>                                                               
                                </tr>
                                <tr>
                                    <td>Storage and Sale of Combustible/Flamable or Explosive Substance</td>
                                    <td><?php echo number_format($row['SubstanceStorage']);?></td>       
                                    <td><?php echo number_format($SubstanceStoragePenalty);?></td>                  
                                    <td><?php echo number_format($SubstanceStoragePenalty + $row['SubstanceStorage']);?></td>                                                               
                                </tr>
                                <tr>
                                    <td>Others</td>
                                    <td><?php echo number_format($row['Others']);?></td>    
                                    <td><?php echo number_format($OthersPenalty);?></td>                  
                                    <td><?php echo number_format($OthersPenalty + $row['Others']);?></td>                                                               
                                </tr>
                                <tr>
                                    <th>Total Fees For LGU</th>
                                    <td></td>                  
                                    <td></td>
                                    <th>₱ <?php echo number_format($total);?></th>          
                                              
                                </tr> 
                                <tr>
                                    <th>Fire Safety Inspection Fee (10%)</th>
                                    <td></td>                  
                                    <td></td>  
                                    <th>₱ <?php echo number_format($row['FireSafetyFee']);?></th>   
                                                    
                                </tr>
                                <tr>
                                    <th>TOTAL</th>
                                    <td></td>                  
                                    <td></td>
                                    <th>₱ <?php echo number_format($row['FireSafetyFee'] + $total);?></th>  
                                                      
                                </tr>                      
                            </tbody>
                        </table>

                
                        <br>
                        <a href="pages-my-businesses.php" class="btn btn-primary">Back</a>
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
